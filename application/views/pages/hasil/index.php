<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if (empty($variabel)) : ?>
                    <h5 class="text-secondary text-center">Variabel tidak ditemukan.</h5>
                <?php else : ?>
                    <?php if (empty($hasil_akhir)) : ?>
                        <h5 class="text-secondary text-center">Hasil tidak ditemukan.</h5>
                    <?php else : ?>
                        <div class="overflow-auto mw-100">
                            <table class="table table-bordered w-100">
                                <thead>
                                    <tr>
                                        <?php $num=0; foreach ($variabel as $key => $value) : $num++ ?>
                                            <?php if ($value->id_status_variabel == 1) : ?>
                                                <th class="align-middle text-center">
                                                    Pengurangan X<?= $num ?>
                                                </th>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                        
                                        <?php $num=0; foreach ($variabel as $value) : $num++ ?>
                                            <?php if ($value->id_status_variabel == 1) : ?>
                                                <th class="align-middle text-center">
                                                    Kuadrat X<?= $num ?>
                                                </th>
                                            <?php endif ?>
                                        <?php endforeach ?>
        
                                        <th class="align-middle text-center">
                                            Hasil Penjumlahan Kuadrat
                                            <?= count($variabel) > 3 ? '<br>' : '' ?> <?= $hasilKuadratLabel ?>
                                        </th>
        
                                        <th class="align-middle text-center">
                                            Y = Kategori KNN
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($daftar_hasil as $key => $value) : ?>
                                        <tr class="text-center">
                                            <?php foreach ($value->hasil as $value2) : ?>
                                                <td class="align-middle">
                                                    <?= !empty($value2->pengurangan) ? $value2->pengurangan : 0 ?>
                                                </td>
                                            <?php endforeach ?>

                                            <?php foreach ($value->hasil as $value2) : ?>
                                                <td class="align-middle">
                                                    <?= !empty($value2->kuadrat) ? $value2->kuadrat : 0 ?>
                                                </td>
                                            <?php endforeach ?>

                                            <td class="align-middle"><?= $value->total_kuadrat ?></td>
                                            <td class="align-middle"><?= $value->kategori ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>

                        <hr>

                        <div class="row mb-2">
                            <div class="col-auto">
                                <label for="nilaiK">Nilai <b>(K) = </b></label>
                            </div>
                            <div class="col-auto">
                                <select name="nilaiK" id="nilaiK" class="form-control form-control-sm">
                                    <?php for ($i=0; $i < count($daftar_hasil); $i++) : ?>
                                        <?php if ($i > 9) { break; } ?>
                                        <option value="<?= $i + 1 ?>"><?= $i+1 ?></option>
                                    <?php endfor ?>
                                </select>
                            </div>
                        </div>
                        <h5 class="font-weight-bold">Hasil Sortir Perhitungan</h5>
                        <div class="overflow-auto mw-100">
                            <table class="table table-bordered w-100" id="sortirTable">
                                <thead>
                                    <tr class="text-center">
                                        <?php $num=0; foreach ($variabel as $key => $value) : $num++ ?>
                                            <?php if ($value->id_status_variabel == 1) : ?>
                                                <th class="align-middle">
                                                    X<?= $num ?>
                                                </th>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                        <th class="align-middle">
                                            Jarak Terkecil( Hasil Akar Dari Penjumlahan Kuadrat )
                                        </th>
                                        <th class="align-middle">
                                            Y = Kategori KNN
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <p id="kesimpulan"> Berdasarkan hasil perhitungan, maka siswa akan memiliki nilai ujian sekolah dengan kategori <b></b></p>
                        <h5 class="font-weight-bold text-center">Grafik Garis Jarak Data</h5>
                        <div class="table-responsive">
                            <div class="chart w-100">
                                <canvas id="lineChart" style="height:250px; min-height:250px"></canvas>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>