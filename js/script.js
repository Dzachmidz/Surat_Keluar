// function showDetail(id) {
//     // Fetch detail data from server
//     fetch(`get_detail.php?id=${id}`)
//         .then(response => response.json())
//         .then(data => {
//             document.getElementById('popup-detail').innerHTML = `
//                 <p>Jenis Surat: ${data.jenis_surat}</p>
//                 <p>Nomor Lengkap: ${data.nomor_lengkap}</p>
//                 <p>Tanggal Surat: ${data.tgl_surat}</p>
//                 <p>Tentang: ${data.tentang}</p>
//                 <a href="${data.pdf_path}" target="_blank">Lihat PDF</a>
//             `;
//             document.getElementById('detail-popup').style.display = 'block';
//         });
// }

// function closeDetail() {
//     document.getElementById('detail-popup').style.display = 'none';
// }

document.getElementById("forgot-password").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("popup").style.display = "flex";
});

document.getElementById("close-popup").addEventListener("click", function() {
    document.getElementById("popup").style.display = "none";
});