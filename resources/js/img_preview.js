const imageField = document.getElementById('image');
const preview = document.getElementById('preview');
const placeholder = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTw_HeSzHfBorKS4muw4IIeVvvRgnhyO8Gn8w&usqp=CAU";
imageField.addEventListener('input', () => {
    if(imageField.files && imageField.files[0]) {

        let reader = new FileReader();

        reader.readAsDataURL(imageField.files[0]);
        reader.onload = event => {
            preview.src = event.target.result;
        }
    } else preview.src = placeholder;
    preview.src = imageField.value || placeholder;
})