// add hovered class to selected list item

let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
});


// aksi tombol menu admin
// function toggleContent(menuId) {
//   var contentDivs = document.querySelectorAll('.content');
//   for (var i = 0; i < contentDivs.length; i++) {
//       contentDivs[i].style.display = 'none';
//   }
//   var selectedContent = document.getElementById(menuId);
//   selectedContent.style.display = 'block';
// }





















// popup inputan tambah
// form anak
document.getElementById('openPopup').addEventListener('click', function() {
  document.getElementById('popup').style.display = 'block';
});

document.getElementById('closePopup').addEventListener('click', function() {
  document.getElementById('popup').style.display = 'none';
});
// form vaksin
document.getElementById('openPopupvaksin').addEventListener('click', function() {
  document.getElementById('popupvaksin').style.display = 'block';
});

document.getElementById('closePopupvaksin').addEventListener('click', function() {
  document.getElementById('popupvaksin').style.display = 'none';
});

// form ibu
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupibu').addEventListener('click', function() {
    document.getElementById('popupibu').style.display = 'block';
  });

  document.getElementById('closePopupibu').addEventListener('click', function() {
    document.getElementById('popupibu').style.display = 'none';
  });
});

// form ibumelahirkan
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupibumelahirkan').addEventListener('click', function() {
    document.getElementById('popupibumelahirkan').style.display = 'block';
  });

  document.getElementById('closePopupibumelahirkan').addEventListener('click', function() {
    document.getElementById('popupibumelahirkan').style.display = 'none';
  });
});

document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopuppos').addEventListener('click', function() {
    document.getElementById('popuppos').style.display = 'block';
  });

  document.getElementById('closePopuppos').addEventListener('click', function() {
    document.getElementById('popuppos').style.display = 'none';
  });
});
// form bidan
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupbidan').addEventListener('click', function() {
    document.getElementById('popupbidan').style.display = 'block';
  });

  document.getElementById('closePopupbidan').addEventListener('click', function() {
    document.getElementById('popupbidan').style.display = 'none';
  });
});
// form bidan
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupkader').addEventListener('click', function() {
    document.getElementById('popupkader').style.display = 'block';
  });

  document.getElementById('closePopupkader').addEventListener('click', function() {
    document.getElementById('popupkader').style.display = 'none';
  });
});
// form user
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupuser').addEventListener('click', function() {
    document.getElementById('popupuser').style.display = 'block';
  });

  document.getElementById('closePopupuser').addEventListener('click', function() {
    document.getElementById('popupuser').style.display = 'none';
  });
});

// form imunisasibayi1
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupimubayi1').addEventListener('click', function() {
    document.getElementById('popupimubayi1').style.display = 'block';
  });

  document.getElementById('closePopupimubayi1').addEventListener('click', function() {
    document.getElementById('popupimubayi1').style.display = 'none';
  });
});
//imunisasibayi2
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupimubayi2').addEventListener('click', function() {
    document.getElementById('popupimubayi2').style.display = 'block';
  });

  document.getElementById('closePopupimubayi2').addEventListener('click', function() {
    document.getElementById('popupimubayi2').style.display = 'none';
  });
});
//imunisasibayi 3
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupimubayi3').addEventListener('click', function() {
    document.getElementById('popupimubayi3').style.display = 'block';
  });

  document.getElementById('closePopupimubayi3').addEventListener('click', function() {
    document.getElementById('popupimubayi3').style.display = 'none';
  });
});


// form timbang1
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupimubayi1timbang').addEventListener('click', function() {
    document.getElementById('popupimubayi1timbang').style.display = 'block';
  });

  document.getElementById('closePopupimubayi1timbang').addEventListener('click', function() {
    document.getElementById('popupimubayi1timbang').style.display = 'none';
  });
});
//imunisasibayi2
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupimubayi2timbang').addEventListener('click', function() {
    document.getElementById('popupimubayi2timbang').style.display = 'block';
  });

  document.getElementById('closePopupimubayi2timbang').addEventListener('click', function() {
    document.getElementById('popupimubayi2timbang').style.display = 'none';
  });
});
//imunisasibayi 3
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupimubayi3timbang').addEventListener('click', function() {
    document.getElementById('popupimubayi3timbang').style.display = 'block';
  });

  document.getElementById('closePopupimubayi3timbang').addEventListener('click', function() {
    document.getElementById('popupimubayi3timbang').style.display = 'none';
  });
});

























// edit
document.addEventListener('DOMContentLoaded', function() {
  var editOpenButtons = document.querySelectorAll('.editopenPopuppos');
  var editCloseButtons = document.querySelectorAll('.editclosePopuppos');

  editOpenButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      var kdPos = "tesss"; 

      // var kdPos = this.getAttribute('data-kdpos');
      document.querySelector('.is-kd').value = kdPos;
      if (kdPos) {
        // Data ditemukan, tampilkan pesan sukses
        alert('Data ditemukan dengan kode pos: ' + kdPos);
      } else {
        // Data tidak ditemukan, tampilkan pesan error
        alert('Data tidak ditemukan.');
      }
      document.querySelector('.editpopuppos').style.display = 'block';
    });
  });

  editCloseButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      document.querySelector('.editpopuppos').style.display = 'none';
    });
  });
});































// popup filter tabel
// filter anak
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupfilter').addEventListener('click', function() {
    document.getElementById('popupfilter').style.display = 'block';
  });

  document.getElementById('closePopupfilter').addEventListener('click', function() {
    document.getElementById('popupfilter').style.display = 'none';
  });
});
// filter vaksin
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupfiltervaksin').addEventListener('click', function() {
    document.getElementById('popupfiltervaksin').style.display = 'block';
  });

  document.getElementById('closePopupfiltervaksin').addEventListener('click', function() {
    document.getElementById('popupfiltervaksin').style.display = 'none';
  });
});

// filter ibu
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupfilteribu').addEventListener('click', function() {
    document.getElementById('popupfilteribu').style.display = 'block';
  });

  document.getElementById('closePopupfilteribu').addEventListener('click', function() {
    document.getElementById('popupfilteribu').style.display = 'none';
  });
});
// filter ibumelahirkan
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupfilteribumelahirkan').addEventListener('click', function() {
    document.getElementById('popupfilteribumelahirkan').style.display = 'block';
  });

  document.getElementById('closePopupfilteribumelahirkan').addEventListener('click', function() {
    document.getElementById('popupfilteribumelahirkan').style.display = 'none';
  });
});

// filter imunisasi bayi1
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupfilterimubayi1').addEventListener('click', function() {
    document.getElementById('popupfilterimubayi1').style.display = 'block';
  });

  document.getElementById('closePopupfilterimubayi1').addEventListener('click', function() {
    document.getElementById('popupfilterimubayi1').style.display = 'none';
  });
});
// filter imunisasi bayi2
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupfilterimubayi2').addEventListener('click', function() {
    document.getElementById('popupfilterimubayi2').style.display = 'block';
  });

  document.getElementById('closePopupfilterimubayi2').addEventListener('click', function() {
    document.getElementById('popupfilterimubayi2').style.display = 'none';
  });
});
// filter imunisasi bayi3
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupfilterimubayi3').addEventListener('click', function() {
    document.getElementById('popupfilterimubayi3').style.display = 'block';
  });

  document.getElementById('closePopupfilterimubayi3').addEventListener('click', function() {
    document.getElementById('popupfilterimubayi3').style.display = 'none';
  });
});

// filter imunisasi bayi1
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupfilterimubayi1timbang').addEventListener('click', function() {
    document.getElementById('popupfilterimubayi1timbang').style.display = 'block';
  });

  document.getElementById('closePopupfilterimubayi1timbang').addEventListener('click', function() {
    document.getElementById('popupfilterimubayi1timbang').style.display = 'none';
  });
});
// filter imunisasi bayi2
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupfilterimubayi2timbang').addEventListener('click', function() {
    document.getElementById('popupfilterimubayi2timbang').style.display = 'block';
  });

  document.getElementById('closePopupfilterimubayi2timbang').addEventListener('click', function() {
    document.getElementById('popupfilterimubayi2timbang').style.display = 'none';
  });
});
// filter imunisasi bayi3
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupfilterimubayi3timbang').addEventListener('click', function() {
    document.getElementById('popupfilterimubayi3timbang').style.display = 'block';
  });

  document.getElementById('closePopupfilterimubayi3timbang').addEventListener('click', function() {
    document.getElementById('popupfilterimubayi3timbang').style.display = 'none';
  });
});
// filter edit
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('openPopupfilteredit').addEventListener('click', function() {
    document.getElementById('popupfilteredit').style.display = 'block';
  });

  document.getElementById('closePopupfilteredit').addEventListener('click', function() {
    document.getElementById('popupfilteredit').style.display = 'none';
  });
});















// chart

document.addEventListener("DOMContentLoaded", function() {
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: 'Berat Badan Anak',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
});



// document.getElementById("simpanpos1").addEventListener("click", function(event) {
//   event.preventDefault(); // Mencegah form submit yang mereset halaman
//   toggleContent('dataposContentsimpan'); // Tampilkan konten dataposContentsimpan
// });


// function simpanData() {
//   var formData = new FormData(document.getElementById("myForm"));

//   var xhr = new XMLHttpRequest();
//   xhr.open("POST", "/koneksi.php", true);
//   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

//   xhr.onreadystatechange = function () {
//       if (xhr.readyState == 4 && xhr.status == 200) {
//           var response = xhr.responseText;
//           if (response == "success") {
//               alert("Data berhasil disimpan.");
//               toggleContent('dataposContentsimpan');
//           } else {
//               alert("Terjadi kesalahan saat menyimpan data.");
//           }
//       }
//   };

//   xhr.send(formData);
// }





  