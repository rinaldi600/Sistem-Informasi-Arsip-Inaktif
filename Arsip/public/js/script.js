console.log("WORK");

const tanggalMasuk = document.querySelector('.tanggal-masuk');
const tanggalAkhir = document.querySelector('.tanggal-akhir');

try {
    tanggalMasuk.addEventListener('change', () => {
        tanggalAkhir.value = tanggalMasuk.value;
    })
} catch (e) {
    console.log(e);
}