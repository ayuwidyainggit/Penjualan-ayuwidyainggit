APLIKASI PENJUALAN
OLEH : AYU WIDYA INGGIT
GMAIL : ayuwidya5601@gmail.com

Aplikasi ini dibuat menggunakan :
1. XAMPP 5.6.19
2. PHP Version 5.6.19
3. ODBC data source
digunakan sebagai penghubung antar mesin database
4. SQL SERVER MANAGEMENT STUDIO
5. SQL SERVER
5. Visual Studio Code
6. File php_pdo_sqlsrv_56_ts.dll dan php_sqlsrv_56_ts.dll

Langkah - langkah membuat aplikasi :
1. instal XAMPP dan ODBC
2.  download php_pdo_sqlsrv_56_ts.dll dan php_sqlsrv_56_ts.dll kemudian diletakkan di folder C:\xampp\php\ext
extension ini digunakan untuk koneksi dari php ke SQL SERVER.
3. Mengaktifkan extension sqlsrv agar php bisa mengakses database SQL Server.
caranya buka php.ini (klik kanan pada xampp bagian config pada apache) kemudian tambahkan 
extension=php_pdo_sqlsrv_56_ts
extension=php_sqlsrv_56_ts



