<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

    <!-- Tampilan Header -->
    <header class="w3-container w3-center w3-padding-48 w3-gray">
        <h1 class="w3-xxxlarge"><b>Bandar Sparepart</b></h1>
        <h5>Selamat Datang di halaman kami 
            <span class="w3-tag">
                <?php
                    echo session()->get('username');
                ?>
            </span>
        </h5>
    </header>

        <!-- First Parallax Image with Logo Text -->
    <div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
    <div class="w3-display-middle" style="white-space:nowrap;">
        <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">WWW.BANDAR <span class="w3-hide-small">SPAREPART.CO.ID</span>
    </div>
    </div>
    
    <div>
        
    </div>

    <!-- First Grid -->
    <div class="w3-row-padding w3-padding-64 w3-container ">
    <div class="w3-content w3-middle w3-center">
        <div class="w3-third w3-center">
        <a class="w3-button w3-black w3-padding-large w3-large w3-center w3-display-middle" 
        href="https://api.whatsapp.com/send?phone=6289663231538" &text="Hai, Saya tertarik dengan produk Anda."  target="_blank">Contact Us</a>
        
        </div>
    </div>
    </div>
    <!-- Second Grid -->
    <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
    <div class="w3-content">
        <div class="w3-third w3-center">
        <img class="img-fluid" alt="image" src="<?= base_url('Image/Logo1.png') ?>" />
        </div>

        <div class="w3-twothird">
        <h1>'     Bandar Sparepart</h1>
        <h5 class="w3-padding-32">'Bandar Sparepart Merupakan sebuah Website yang menyediakan Barang-barang Sparepart Motor dari
        yang bekas sampai yang baru dan yang termurah sampai yang terlangka</h5>

        <p class="w3-text-grey">Di Website ini User bisa mencari dan membeli sparepart yang dibutuhkan dengan mencari barangnya di Kolom
        etalase yang ada di Navbar atas. dan juga untuk yang ingin menjual sparepart bekas dapat juga dapat menghubungi admin dengan
        menekan tombol Contact Us diatas</p>
        </div>
    </div>
    </div>


    <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
        <h1 class="w3-margin w3-xlarge">Cari barang Sparepart Termurahh yahh di Bandar Sparepart!!!</h1>
    </div>

<?= $this->endSection() ?>