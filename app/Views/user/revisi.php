<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="home-content">

    <div class="overview-boxes">
        <!-- fieldsets -->
        <div class="card" style="width:100%;z-index: 1;">
            <div class="card-header text-center">
                <div class="text-center" id="progressbar">
                    <li class="active" id="none0"></li>
                    <li id="none1"></li>
                    <li id="none2"></li>
                    <li id="none3"></li>
                    <li id="none4"></li>
                    <li id="none5"></li>
                    <li id="none6"></li>
                    <li id="none7"></li>
                    <li id="none8"></li>
                    <li id="none9"></li>
                </div>
            </div>
            <form id="msform" action="/user/update/<?= $data['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $data['slug']; ?>">
                <fieldset>
                    <div class="card-header">
                        <h5 class="card-title">Daftar Perubahan Dokumen</h5>
                    </div>
                    <textarea class="form-control <?= ($validation->hasError('revisi')) ? 'is-invalid' : ''; ?>" placeholder="Isi Daftar Perubahan Dokumen IK disini. . ." name="revisi" id="revisi"><?= (old('revisi')) ? old('revisi') : $data['revisi']; ?></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('revisi'); ?>
                    </div>
                    <script>
                        ClassicEditor.create(document.getElementById('revisi'), {
                            ckfinder: {
                                uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                            }

                        }).then(editor => {
                            console.log(editor);
                        }).catch(error => {
                            console.log(error);
                        });
                    </script>
                    <input type="button" name="next" class="next action-button" value="Next Step" />
                </fieldset>

                <fieldset>
                    <div class="card-header">
                        <h5 class="card-title">Tujuan</h5>
                    </div>
                    <textarea placeholder="Isi Tujuan Dokumen IK disini. . ." name="tujuan" id="tujuan"><?= (old('tujuan')) ? old('tujuan') : $data['tujuan']; ?></textarea>

                    <script>
                        ClassicEditor.create(document.getElementById('tujuan'), {
                            ckfinder: {
                                uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                            }

                        }).then(editor => {
                            console.log(editor);
                        }).catch(error => {
                            console.log(error);
                        });
                    </script>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next Step" />
                </fieldset>

                <fieldset>
                    <div class="card-header">
                        <h5 class="card-title">Ruang Lingkup</h5>
                    </div>
                    <textarea placeholder="Isi Ruang lingkup Dokumen IK disini. . ." name="ckeditor1" id="ruangLingkup"><?= (old('ckeditor1')) ? old('ckeditor1') : $data['ruang_lingkup']; ?></textarea>
                    <script>
                        ClassicEditor.create(document.getElementById('ruangLingkup'), {
                            ckfinder: {
                                uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                            }

                        }).then(editor => {
                            console.log(editor);
                        }).catch(error => {
                            console.log(error);
                        });
                    </script>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next Step" />
                </fieldset>

                <fieldset>
                    <div class="card-header">
                        <h5 class="card-title">Definisi</h5>
                    </div>
                    <textarea name="definisi" id="definisi"><?= (old('definisi')) ? old('definisi') : (($data['definisi']) ? $data['definisi'] : '<figure class="table"><table><thead><tr><th>Definisi/Istilah/Singkatan</th><th>Penjelasan</th></tr></thead><tbody><tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>'); ?></textarea>
                    <script>
                        ClassicEditor.create(document.getElementById('definisi'), {
                            ckfinder: {
                                uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                            }

                        }).then(editor => {
                            console.log(editor);
                        }).catch(error => {
                            console.log(error);
                        });
                    </script>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next Step" />
                </fieldset>

                <fieldset>
                    <div class="card-header">
                        <h5 class="card-title">Dokumen Terkait</h5>
                        <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#pendukung">dokumen Pendukung</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#referensi">Dokumen Referensi</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#perizinan">Dokumen Perizinan</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#teknik">Dokumen/Data Teknik</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane active" id="pendukung">
                            <div class="row mb-3">
                                <div class="col">
                                    <textarea placeholder="Inputkan Dokumen Pendukung disini. . ." name="ckeditor3" id="dokumenPendukung"><?= (old('ckeditor3')) ? old('ckeditor3') : $data['terkait_pendukung']; ?></textarea>
                                    <script>
                                        ClassicEditor.create(document.getElementById('dokumenPendukung'), {
                                            ckfinder: {
                                                uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                                            }

                                        }).then(editor => {
                                            console.log(editor);
                                        }).catch(error => {
                                            console.log(error);
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="referensi">
                            <div class="row mb-3">
                                <div class="col">

                                    <textarea placeholder="Inputkan Dokumen Referensi disini. . ." name="ckeditor4" id="dokumenReferensi"><?= (old('ckeditor4')) ? old('ckeditor4') : $data['terkait_referensi']; ?></textarea>
                                    <script>
                                        ClassicEditor.create(document.getElementById('dokumenReferensi'), {
                                            ckfinder: {
                                                uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                                            }

                                        }).then(editor => {
                                            console.log(editor);
                                        }).catch(error => {
                                            console.log(error);
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane" id="perizinan">
                            <div class="row mb-3">
                                <div class="col">

                                    <textarea placeholder="Inputkan Dokumen Perizinan disini. . ." name="ckeditor5" id="dokumenPerizinan"><?= (old('ckeditor5')) ? old('ckeditor5') : $data['terkait_perizinan']; ?></textarea>
                                    <script>
                                        ClassicEditor.create(document.getElementById('dokumenPerizinan'), {
                                            ckfinder: {
                                                uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                                            }

                                        }).then(editor => {
                                            console.log(editor);
                                        }).catch(error => {
                                            console.log(error);
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane" id="teknik">
                            <div class="row mb-3">
                                <div class="col">

                                    <textarea placeholder="Inputkan Data Teknik disini. . ." name="ckeditor6" id="dataTeknik"><?= (old('ckeditor6')) ? old('ckeditor6') : $data['terkait_teknik']; ?></textarea>
                                    <script>
                                        ClassicEditor.create(document.getElementById('dataTeknik'), {
                                            ckfinder: {
                                                uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                                            }

                                        }).then(editor => {
                                            console.log(editor);
                                        }).catch(error => {
                                            console.log(error);
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next Step" />
                </fieldset>


                <fieldset>
                    <div class="card-header">
                        <h5 class="card-title">Sumber Daya</h5>
                        <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#sdm">SDM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#tools">Tools, APD dan Peralatan Kerja lainnya</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#material">Material</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="sdm">
                            <textarea name="ckeditor12" id="datasdm"><?= (old('ckeditor12')) ? old('ckeditor12') : (($data['sumber_sdm']) ? $data['sumber_sdm'] : '<figure class="table"><table><thead><tr><th>No</th><th>Kompetensi/Keahlian</th><th>Jumlah</th><th>Keterangan</th></tr></thead><tbody><tr><td>1</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>'); ?></textarea>
                            <script>
                                ClassicEditor.create(document.getElementById('datasdm'), {
                                    ckfinder: {
                                        uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                                    }

                                }).then(editor => {
                                    console.log(editor);
                                }).catch(error => {
                                    console.log(error);
                                });
                            </script>
                        </div>
                        <div class="tab-pane" id="tools">
                            <textarea name="ckeditor13" id="datatools"><?= (old('ckeditor13')) ? old('ckeditor13') : (($data['sumber_tools']) ? $data['sumber_tools'] : '<figure class="table"><table><thead><tr><th>No</th><th>Tools, APD dan Peralatan Kerja</th><th>Jumlah</th><th>Keterangan</th></tr></thead><tbody><tr><td>1</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>'); ?></textarea>
                            <script>
                                ClassicEditor.create(document.getElementById('datatools'), {
                                    ckfinder: {
                                        uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                                    }

                                }).then(editor => {
                                    console.log(editor);
                                }).catch(error => {
                                    console.log(error);
                                });
                            </script>
                        </div>
                        <div class="tab-pane" id="material">
                            <textarea name="ckeditor14" id="datamaterial"><?= (old('ckeditor14')) ? old('ckeditor14') : (($data['sumber_material']) ? $data['sumber_material'] : '<figure class="table"><table><thead><tr><th>No</th><th>Nama Material</th><th>Jumlah</th><th>Keterangan</th></tr></thead><tbody><tr><td>1</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>'); ?></textarea>
                            <script>
                                ClassicEditor.create(document.getElementById('datamaterial'), {
                                    ckfinder: {
                                        uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                                    }

                                }).then(editor => {
                                    console.log(editor);
                                }).catch(error => {
                                    console.log(error);
                                });
                            </script>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next Step" />
                </fieldset>

                <fieldset>
                    <div class="card-header">
                        <h5 class="card-title">Identifikasi Risiko</h5>
                        <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#identifikasi">Identifikasi Risiko</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#mitigasi">Mitigasi Risiko</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="identifikasi">
                            <textarea name="ckeditor15" id="dataidentifikasi"><?= (old('ckeditor15')) ? old('ckeditor15') : (($data['risiko_identifikasi']) ? $data['risiko_identifikasi'] : '<figure class="table"><table><thead><tr><th rowspan="2">No</th><th colspan="3">Identifikasi Risiko</th><th rowspan="2">Kemungkinan</th><th rowspan="2">Dampak</th><th rowspan="2">Level Risiko Inheren</th></tr><tr><th>Risiko</th><th>Penyebab</th><th>Dampak</th></tr></thead><tbody><tr><td>1</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>'); ?></textarea>
                            <script>
                                ClassicEditor.create(document.getElementById('dataidentifikasi'), {
                                    ckfinder: {
                                        uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                                    }

                                }).then(editor => {
                                    console.log(editor);
                                }).catch(error => {
                                    console.log(error);
                                });
                            </script>
                        </div>
                        <div class="tab-pane" id="mitigasi">
                            <textarea name="ckeditor16" id="datamitigasi"><?= (old('ckeditor16')) ? old('ckeditor16') : (($data['risiko_mitigasi']) ? $data['risiko_mitigasi'] : '<figure class="table"><table><thead><tr><th>No</th><th>Control</th><th>Level Risiko Pasca Control</th><th>Action Plan</th><th>Level Risiko Residual</th></tr></thead><tbody><tr><td>1</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>'); ?></textarea>
                            <script>
                                ClassicEditor.create(document.getElementById('datamitigasi'), {
                                    ckfinder: {
                                        uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                                    }

                                }).then(editor => {
                                    console.log(editor);
                                }).catch(error => {
                                    console.log(error);
                                });
                            </script>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next Step" />
                </fieldset>

                <fieldset>
                    <div class="card-header">
                        <h5 class="card-title">Metode Pengukuran & Parameter</h5>
                    </div>
                    <textarea name="ckeditor17" id="dataparameter"><?= (old('ckeditor17')) ? old('ckeditor17') : (($data['parameter']) ? $data['parameter'] : '<figure class="table"><table><thead><tr><th>No</th><th>Metode</th><th>Parameter</th><th>Keterangan</th></tr></thead><tbody><tr><td>1</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>2</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>'); ?></textarea>
                    <script>
                        ClassicEditor.create(document.getElementById('dataparameter'), {
                            ckfinder: {
                                uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                            }

                        }).then(editor => {
                            console.log(editor);
                        }).catch(error => {
                            console.log(error);
                        });
                    </script>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next Step" />
                </fieldset>

                <fieldset>
                    <div class="card-header">
                        <h5 class="card-title">Detail Aktivitas</h5>
                    </div>
                    <textarea placeholder="Isi Detail Aktivitas Dokumen IK disini. . ." name="ckeditor7" id="detail_aktivitas"><?= (old('ckeditor7')) ? old('ckeditor7') : (($data['detail_aktivitas']) ? $data['detail_aktivitas'] : '<ul><li>Perencanaan/ Persiapan meliputi aktivitas berikut :<ol><li>&nbsp;</li><li>&nbsp;</li></ol></li></ul><p>&nbsp;</p><ul><li>Pelaksanaan meliputi aktivitas berikut :<ol><li>&nbsp;</li><li>&nbsp;</li></ol></li></ul><p>&nbsp;</p><ul><li>Monitoring<ol><li>&nbsp;</li><li>&nbsp;</li></ol></li></ul><p>&nbsp;</p><ul><li>Tindakan Lanjut/ Control yang perlu dilakukan :<ol><li>&nbsp;</li><li>&nbsp;</li></ol></li></ul>'); ?></textarea>
                    <script>
                        ClassicEditor.create(document.getElementById('detail_aktivitas'), {
                            ckfinder: {
                                uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                            }

                        }).then(editor => {
                            console.log(editor);
                        }).catch(error => {
                            console.log(error);
                        });
                    </script>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="button" name="next" class="next action-button" value="Next Step" />
                </fieldset>

                <fieldset>
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#formulir">Formulir</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#lampiran">Lampiran</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="formulir">
                            <textarea placeholder="Isi daftar formulir disini. . ." name="ckeditor8" id="dataformulir"><?= (old('ckeditor8')) ? old('ckeditor8') : (($data['formulir']) ? $data['formulir'] : '<p>Daftar formulir yang digunakan dalam pelaksanaan proses bisnis ini adalah :</p><ul><li>&nbsp;</li></ul>'); ?></textarea>
                            <script>
                                ClassicEditor.create(document.getElementById('dataformulir'), {
                                    ckfinder: {
                                        uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                                    }

                                }).then(editor => {
                                    console.log(editor);
                                }).catch(error => {
                                    console.log(error);
                                });
                            </script>
                        </div>
                        <div class="tab-pane" id="lampiran">
                            <textarea placeholder="Sertakan Lampiran disini. . ." name="ckeditor9" id="datalampiran"><?= (old('ckeditor9')) ? old('ckeditor9') : $data['lampiran']; ?></textarea>
                            <script>
                                ClassicEditor.create(document.getElementById('datalampiran'), {
                                    ckfinder: {
                                        uploadUrl: "<?= base_url('user/uploadImages'); ?>",
                                    }

                                }).then(editor => {
                                    console.log(editor);
                                }).catch(error => {
                                    console.log(error);
                                });
                            </script>
                        </div>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    <input type="submit" name="selesai" class="action-button" value="Confirm" />
                </fieldset>

                <!-- <fieldset>
                    <h2 class="fs-title text-center">Success !</h2>
                    <br><br>
                    <div class="row justify-content-center">
                        <div class="col-3">
                            <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                        </div>
                    </div>
                    <br><br>
                    <div class="row justify-content-center">
                        <div class="col-7 text-center">
                            <h5>You Have Successfully Signed Up</h5>
                        </div>
                    </div>
                </fieldset> -->


                <div class="card-footer text-center">
                    <small><a href="<?= base_url('bidang'); ?>">&laquo; back to <?= $divisi['nama']; ?></a></small>
                </div>
            </form>
        </div>



    </div>
</div>

<?= $this->endSection(); ?>