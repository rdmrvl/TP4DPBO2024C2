# TP4DPBO2024C2
TP4DPBO2024C2

Tugas Praktikum 3 DPBO

Saya Marvel Ravindra Dioputra [2200481] TP4 dalam Mata Kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

Untuk tugas praktikum ini, membuat program OOP menggunakan PHP yang menerapkan struktur MVC yang dapat melakukan CRUD pada kedua tabel. Tema yang diambil adalah joki game, di mana terdapat form untuk menambahkan member yang ingin menggunakan jasa joki untuk game tertentu, dan form untuk menambahkan game baru. Dalam struktur kode yang saya buat, terdapat dua tabel yaitu "member" dan "game". Tabel "member" memiliki atribut id, nama, email, no_telp, dan game yang ingin di jokikan, sedangkan tabel "game" hanya memiliki atribut id dan nama game.

Alur
Model (models/Member.class.php dan models/Game.class.php):
Kelas Member dan Game digunakan untuk berinteraksi dengan database. Mereka memiliki metode untuk mengambil data member dan game, menambahkan data baru, mengedit data, dan menghapus data.

View (views/MemberAdd.view.php, views/MemberEdit.view.php, dan views/Member.view.php):
Kelas-kelas MemberAdd, MemberEdit, dan Member view bertanggung jawab untuk menampilkan tampilan (UI). Mereka menggunakan template HTML dan data yang diberikan oleh controller untuk menghasilkan tampilan.

Controller (controllers/Member.controller.php):
Kelas MemberController dan GameController sebagai penghubung antara model dan view.

Desain db
![WhatsApp Image 2024-05-03 at 7 47 22 PM](https://github.com/rdmrvl/TP4DPBO2024C2/assets/64513644/d05da5f9-45d3-47da-9d94-c7fa4d6bdc81)

Tampilan Index 
![Screenshot (776)](https://github.com/rdmrvl/TP4DPBO2024C2/assets/64513644/47618814-e05e-4d31-ac16-efe0b4abb58d)

Tampilan Form Add/Edit
![Screenshot (778)](https://github.com/rdmrvl/TP4DPBO2024C2/assets/64513644/2f55c7d6-ff02-47e0-b959-52f440d825a7)
![Screenshot (779)](https://github.com/rdmrvl/TP4DPBO2024C2/assets/64513644/960121bb-d9d0-40b5-9a0e-57cccc92e5ef)

Tampilan Game (Add/Edit/Delete)
![Screenshot (777)](https://github.com/rdmrvl/TP4DPBO2024C2/assets/64513644/62a28cb7-6234-4f38-b5f7-75cc241bab2e)
