# JOBSHEET 03 MIGRATION, SEEDER, DB FAÇADE, QUERY BUILDER, dan ELOQUENT ORM

> Nama : Ahmad Aria Adi Saputra <br>
> NIM : 2241720247 <br>
> Kelas / No. : TI-2H / 02

### 1. Pada **Praktikum 1 - Tahap 5**, apakah fungsi dari APP_KEY pada file setting .env Laravel?

> `APP_KEY` pada file `.env` Laravel adalah kunci enkripsi (kunci untuk membuka enkripsi) yang digunakan untuk menjaga keamanan data sensitif dalam aplikasi.

### 2. Pada Praktikum 1, bagaimana kita men-generate nilai untuk APP_KEY?

```bash
php artisan key:generate
```

### 3. Pada Praktikum 2.1 - Tahap 1, secara default Laravel memiliki berapa file migrasi? dan untuk apa saja file migrasi tersebut?

> Terdapat 4 file migrasi, yaitu :
>
> 1. **2014_10_12_100000_create_password_reset_tokens_table.php**:
>    untuk membuat schema tabel password_resets_tokens reset password.
> 2. **2014_10_12_000000_create_users_table.php**:
>    untuk membuat schema tabel users.
> 3. **2019_08_19_000000_create_failed_jobs_table.php**:
>    untuk membuat schema tabel failed_jobs yang berfungsi sebagai tempat menyimpan data failed job yang terjadi pada aplikasi.
> 4. **2019_12_14_000001_create_personal_access_tokens_table.php**:
>    untuk membuat schema tabel personal_access_tokens yang digunakan untuk menyimpan data token personal access yang digunakan untuk mengatur token reset password dan sebagainya.

### 4. Secara default, file migrasi terdapat kode **$table->timestamps();**, apa tujuan/output dari fungsi tersebut?

> Fungsi `$table->timestamps();` pada file migrasi bertujuan untuk menambahkan kolom `created_at` dan `updated_at` pada tabel database yang sedang dibuat, yang akan mencatat waktu pembuatan dan pembaruan setiap entri dalam tabel tersebut.

### 5. Pada File Migrasi, terdapat fungsi **$table->id();** Tipe data apa yang dihasilkan dari fungsi tersebut?

> Tipe data yang dihasilkan adalah

```sql
BIGINT UNSIGNED
```

### 6. Apa bedanya hasil migrasi pada table m_level, antara menggunakan **$table->id();** dengan menggunakan **$table->id('level_id');** ?

> Perbedaan antara `$table->id();` dan `$table->id('level_id');` dalam hasil migrasi pada tabel m_level adalah penamaan kolom primary key yang dihasilkan. Hasil jika tanpa parameter adalah `id` sedangkan `$table->id('level_id');` adalah `level_id`.

### 7. Pada migration, Fungsi **->unique()** digunakan untuk apa?

> Fungsi `->unique()` pada migration digunakan untuk menetapkan kolom sebagai unik, yang berarti nilainya harus unik atau tidak boleh ada nilai yang sama dalam kolom tersebut.

### 8. Pada Praktikum **2.2 - Tahap 2**, kenapa kolom level_id pada tabel m_user menggunakan **$tabel->unsignedBigInteger('level_id')**, sedangkan kolom level_id pada tabel m_level menggunakan **$tabel->id('level_id')** ?

> Kolom level_id pada tabel m_user menggunakan `$table->unsignedBigInteger('level_id')` karena kolom ini berperan sebagai foreign key yang merujuk ke kolom id pada tabel `m_level`, yang secara default bertipe unsigned big integer. Sedangkan kolom level_id pada tabel m_level menggunakan `$table->id('level_id') `sebagai primary key.

### 9. Pada **Praktikum 3 - Tahap 6**, apa tujuan dari Class Hash? dan apa maksud dari kode program **Hash::make('1234');**?

> **Hash** digunakan untuk mengenkripsi data yang dalam kasus umum seperti data informasi personal seperti data password.

### 10. ada **Praktikum 4 - Tahap 3/5/7**, pada query builder terdapat tanda tanya (?), apa kegunaan dari tanda tanya (?) tersebut?

> Tanda tanya `(?)` pada query builder berperan sebagai **parameter marker** yang akan diisi sesuai urutan.

### 11. Pada **Praktikum 6 - Tahap 3**, apa tujuan penulisan kode **protected $table = ‘m_user’;** dan **protected $primaryKey = ‘user_id’;** ?

> Penulisan protected `$table = 'm_user';` menunjukkan bahwa model terkait dengan tabel '`m_user'`, sementara protected `$primaryKey = 'user_id';` menetapkan bahwa `'user_id'` adalah primary key dari tabel tersebut.

### 12. Menurut kalian, lebih mudah menggunakan mana dalam melakukan operasi CRUD ke database (DB Façade / Query Builder / Eloquent ORM) ? jelaskan

> Lebih mudah dengan menggunakan Eloquent ORM karena sesuai dengan konsep MVC yang membuat kode lebih mudah untuk dikelola dan dibaca.
