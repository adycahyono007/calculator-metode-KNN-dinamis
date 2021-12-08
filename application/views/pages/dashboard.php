<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Aplikasi Klasifikasi Kelulusan Siswa SD Dengan Metode KNN</h1>
            </div>
            <div class="card-body ">
                <p style='text-align:justify'><b>Algoritma K-Nearest Neighbor (K-NN)</b> adalah sebuah metode klasifikasi terhadap sekumpulan data berdasarkan pembelajaran  data yang sudah terklasifikasikan sebelumya. Metode ini termasuk kedalam supervised learning, dimana hasil query instance yang baru, diklasifikasikan berdasarkan mayoritas kedekatan jarak dari kategori yang sudah terklasifikasikan dalam didalam metode K-NN.</p>
                <br>
                <p style='text-align:justify'<ol><b>Tahapan - tahapan dari Algoritma K-NN</b>
                <li>Menentukan parameter K (jumlah tetangga paling dekat).</li>
                <li>Menghitung kuadrat jarak Euclidean objek terhadap data training yang diberikan.</li>
                
                
                <li><img src="<?= base_url('assets/images/rumus-jarak-euclidean.png') ?>" alt="logo" width="400" height="100"class="img-responsive center-block" /></li>
                <li>Mengurutkan hasil jarak antar data secara ascending (berurutan dari nilai tinggi ke rendah).</li>
                <li>Mengumpulkan kategori Y (Klasifikasi Nearest Neighbor berdasarkan nilai K).</li>
                <li>Dengan menggunakan nilai mayoritas pada kategori Nearest Neighbor, maka dapat diprediksikan kategori suatu objek.</li>
</ol></p>
            </div>
        </div>
    </div>
</div>