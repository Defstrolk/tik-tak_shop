document
  .getElementById("reviewForm")
  .addEventListener("submit", function (event) {
    const fileInput = document.getElementById("file");
    const file = fileInput.files[0];
    const maxSize = 5 * 1024 * 1024; 
    const allowedTypes = ["image/png", "image/jpg", "image/jpeg", "image/webp"];

    if (file) {
      if (!allowedTypes.includes(file.type)) {
        alert("Разрешены только файлы типа PNG, JPG, JPEG, GIF.");
        event.preventDefault();
        return;
      }

      if (file.size > maxSize) {
        alert("Размер файла превышает 2 MB.");
        event.preventDefault();
        return;
      }
      if(!allowedTypes.includes(file.type) && (file.size > maxSize)){
        alert("Файл принят для загрузки");
      }
    } else {
      alert("Файл не выбран");
    }
  });
