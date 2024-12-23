![image](https://github.com/user-attachments/assets/68ad91ad-6d11-46f5-b816-be64ac8c00f5)# UAS_RA_122140065

Nama: Marchel Karuna Kwee
NIM: 122140065
Kelas: RA

# Bagian 1: Client-side Programming (Bobot: 30%)
![image](https://github.com/user-attachments/assets/04fdba9a-bdb0-4e29-883b-75cf8c2da3ac)
Gambar 1. Tampilan halaman register untuk membuat akun baru

![image](https://github.com/user-attachments/assets/00c5be13-6fe6-4323-bf6d-9566d16435ad)
Gambar 2. Tampilan gagal membuat akun baru dikarenakan input yang tidak sesuai

![image](https://github.com/user-attachments/assets/5e3610e4-6dbb-4946-a0bf-288da9df9582)
Gambar 3. Tampilan halaman login untuk mengakses halaman beranda

![image](https://github.com/user-attachments/assets/8cb965b6-ee65-4da0-8cce-2af29b922152)
Gambar 4. Tampilan gagal melakukan login dikarenakan input yang tidak sesuai dengan ketentuan

# Bagian 2: Server-side Programming (Bobot: 30%)
![image](https://github.com/user-attachments/assets/1d51b1c9-4afe-4a0f-9bc9-a8d9cb8d1c15)
Gambar 5. Tampilan halaman beranda yang menampilkan kalimat pembuka website.

![image](https://github.com/user-attachments/assets/9e404d28-eb81-4636-852d-8f0311950b5e)
Gambar 6. Tampilan halaman tabel yang menampilkan informasi tentang webtoon yang disajikan dalam tabel. Halaman ini juga menampilkan tombol Update, Delete dan Create.

# Bagian 3: Database Management (Bobot: 30%)
![image](https://github.com/user-attachments/assets/161e56ef-7862-4d89-94fe-de14fbcbde4d)
Gambar 7. Tampilan pembuatan tabel "webtoon" menggunakan MySql, yang di dalamnya terdiri dari 5 variabel, yaitu "id", "kode", "nama", "author" dan "episode".

![image](https://github.com/user-attachments/assets/211b421e-dd01-44db-917e-05bddc2552ec)
Gambar 8. Tampilan pembuatan tabel "login" menggunakan MySql, yang di dalamnya terdiri dari 5 variabel, yaitu "id", "username", "password", "email" dan "akun_ig".

![image](https://github.com/user-attachments/assets/f02431d3-28aa-43c9-beeb-9565007bd508)
Gambar 9. Tampilan tabel "webtoon" dan "login" pada database "webtoon" melalui PhpMyAdmin

![image](https://github.com/user-attachments/assets/255bf9ee-6440-435a-8ee2-03151a815542)
Gambar 10. Tampilan menghubungkan database

![image](https://github.com/user-attachments/assets/a7fc0ac1-19b7-4fc3-8e9d-f813e5e0d91f)
![image](https://github.com/user-attachments/assets/4044cb97-6bd0-4bc9-8598-195ea975be62)
Gambar 11. Tampilan manipulasi data pada database

# Bagian 4: State Management (Bobot: 20%)
![image](https://github.com/user-attachments/assets/00df130e-0ba7-470d-b699-392d88a5ada1)
Gambar 12. Tampilan penggunaan session_start() untuk memulai session

![image](https://github.com/user-attachments/assets/523dfbe9-3854-408b-a2cd-45051ec62542)
Gambar 13. Tampilan pengelolaan state dengan menggunakan cookie dan browser storage

# Bagian Bonus: Hosting Aplikasi Web (Bobot: 20%)
- Saat ingin melakukan hostingan aplikasi web, tentunya perlu mencari tahu terlebih dahulu layanan hostingan apa yang akan digunakan. Kali ini, hostingan yang digunakan melalui website Infinity Free. Buat akun baru setelah mengakses website itu dan pilih domain yang gratis untuk mulai membuat hosting. Lalu, file aplikasi web akan diunggah melalui file manager yang terdapat pada layanan Infinity Free untuk menempatkannya pada folder htdocs. Pembuatan database juga dapat dilakukan pada Infinity Free dengan mengakses cpanel.
- Untuk sekarang, Infinity Free menjadi yang paling cocok digunakan, karena layanan hosting ini menyediakan fitur hosting yang gratis, penyimpanan dan badwith tanpa batas, didukung dengan Php dan MySql dan subdomain yang gratis.
- Melakukan sanitasi dan escape data yang dimasukkan oleh pengguna. Pastikan bahwa aplikasi website memiliki pengelolaan pengguna dan hak akses yang baik.Gunakan password yang kuat untuk database MySQL dan pastikan username dan password untuk koneksi database tidak mudah ditebak.
- Penggunaan subdomain gratis yang disediakan oleh Infinity Free, seperti webiste ini "uas-webtoon-pemweb-065.freesite.online". Akses File Manager yang tersedia di cPanel InfinityFree untuk mengelola file aplikasi web Anda. Menerapkan Zero Trust atau pengaturan keamanan lainnya di sisi aplikasi (misalnya, autentikasi dua faktor atau validasi input yang ketat).
