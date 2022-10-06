const imageField = document.getElementById('image');
const preview = document.getElementById('preview');
const placeholder = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTw_HeSzHfBorKS4muw4IIeVvvRgnhyO8Gn8w&usqp=CAU";
imageField.addEventListener('input', () => {
    preview.src = imageField.value || placeholder;
})