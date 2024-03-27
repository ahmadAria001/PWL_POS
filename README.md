# JOBSHEET 6 - Template Form (AdminLTE), Server Validation, Client Validation, CRUD

> Nama : Ahmad Aria Adi Saputra <br>
> NIM : 2241720247 <br>
> Kelas / No. : TI-2H / 02

## A. Template Form (AdminLTE)

![alt text](image-6.png)<br>
![alt text](image-7.png)<br>

## B. VALIDASI PADA SERVER

-   Validasi <br>

```php
    function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'kodeKategori' => 'required',
            'namaKategori' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('/kategori/create')
                ->withErrors($validator)
                ->withInput();
        }
        Kategori::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }
```

-   Tulis perbedaan penggunaan validate dengan validateWithBag!

    > Metode validate() langsung menangani validasi data dari permintaan dan mengembalikan respons kesalahan yang telah ditetapkan jika validasi gagal, sedangkan metode validateWithBag() memungkinkan untuk menetapkan pesan kesalahan ke "tas" yang dapat diatur sendiri, memberikan lebih banyak kendali atas bagaimana pesan kesalahan tersebut ditampilkan atau diproses.

-   tetapkan bail aturan ke atribut: coba sesuaikan dengan field pada m_kategori, apa yang terjadi?

```php
 $validator = Validator::make($request->all(), [
            'kodeKategori' => 'bail|required|unique:posts|max:255',
            'namaKategori' => 'required',
        ]);
```

> Dengan menetapkan aturan bail pada atribut, jika validasi pada atribut tersebut gagal, Laravel akan menghentikan proses validasi lebih lanjut untuk atribut lainnya dan langsung mengembalikan pesan kesalahan untuk atribut yang gagal tersebut.

-   Pada view/create.blade.php tambahkan code berikut agar ketika validasi gagal, kita
    dapat menampilkan pesan kesalahan dalam tampilan: <br>

```php
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
```

Hasil <br>
![alt text](image-8.png)<br>

-   Pada view/create.blade.php tambahkan dan coba running code berikut :<br>

```php
<input type="text" class="@error('kodeKategori') is-invalid @enderror form-control"
id="kodeKategori" name="kodeKategori" placeholder="untuk barang, contoh : AOC0">

@error('kodeKategori')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
```

![alt text](image-9.png)<br>

## C. FORM REQUEST VALIDATION

-   StorePostRequest

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kodeKategori' => 'required',
            'namaKategori' => 'required',
        ];
    }
}
```

-   Hasil
    ![alt text](image-10.png)<br>

## D. CRUD(create, read, update, delete

-   Halaman awal m_user<br>
    ![alt text](image-11.png)
-   Halaman input user<br>
    ![alt text](image-12.png)
-   Halaman show user<br>
    ![alt text](image-13.png)
-   Halaman edit user<br>
    ![alt text](image-14.png)
-   Notif delete user<br>
    ![alt text](image-15.png)
