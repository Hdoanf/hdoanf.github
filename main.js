function xemchitiet(id) {
  // Hiển thị modal
  var myModal = new bootstrap.Modal(document.getElementById('modal'));
  myModal.show();

  //lay du lieu cua file chitiet cho vao trong the modalbody o tren
  fetch(`chitiet.php?id=${id}`)
    .then(response => response.text())
    .then(data => {
      document.getElementById("modalbody").innerHTML = data;
    })
    .catch(error => {
      console.log(error)
      document.getElementById("modalbody").innerHTML = '<p class="text-danger">Lỗi</p>';
    });
}

function suataisan(id) {
  var myModal = new bootstrap.Modal(document.getElementById('modalSua'));
  myModal.show();
  fetch(`sua.php?id=${id}`)
    .then(response => response.text())
    .then(data => {
      document.getElementById("modalbodysua").innerHTML = data;
    })
    .catch(error => {
      console.log(error)
      document.getElementById("modalbodysua").innerHTML = '<p class="text-danger">Lỗi</p>';
    });
}

let tscanxoa = null;

function xoa(id) {
  tscanxoa = id; // luu barcode vao bien nay 
  var myModal = new bootstrap.Modal(document.getElementById('modalXoa'));
  myModal.show();
}


document.getElementById("btnXacNhanXoa").addEventListener("click", function() {
  if (tscanxoa) {
    fetch(`xoa.php?id=${tscanxoa}`)
      .then(response => response.text()) //lay du lieu xoa
      .then(data => {
        console.log(data);

        // toast xoa
        var toast = document.getElementById('toast');
        var toastBody = document.getElementById('toastbd');
        toastBody.innerHTML = "Xóa thành công";
        var toast = new bootstrap.Toast(toast);
        toast.show();

        // an modal
        var modal = bootstrap.Modal.getInstance(document.getElementById('modalXoa'));
        if (modal) modal.hide();

        setTimeout(() => {
          location.reload();
        }, 1500);
      })
      .catch(error => {
        console.error("Lỗi:", error);
      });
  }
});

//them
function themtaisan() {
  var myModal = new bootstrap.Modal(document.getElementById('modalThem'));
  myModal.show();
  fetch(`them.php`)
    .then(response => response.text())
    .then(data => {
      document.getElementById("modalbodythem").innerHTML = data;
    })
    .catch(error => {
      console.log(error)
      document.getElementById("modalbodythem").innerHTML = '<p class="text-danger">Lỗi</p>';
    });
}

function thongbao(id) {
  var myModal = new bootstrap.Modal(document.getElementById('modalthongbao'));
  myModal.show();

  fetch(`thongbaohong.php?id=${id}`)
    .then(response => response.text())
    .then(data => {
      document.getElementById("modalbodythongbao").innerHTML = data;
    })
    .catch(error => {
      console.log(error);
      document.getElementById("modalbodythongbao").innerHTML = '<p class="text-danger">Lỗi</p>';
    });
}


// hien thi toast
document.addEventListener('DOMContentLoaded', function() {
  var toast = document.getElementById('toast');
  if (toast.innerText.trim() !== "") {
    var toast = new bootstrap.Toast(toast);
    toast.show();
  }
});

