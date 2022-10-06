const deleteForms = document.querySelectorAll('.delete-form');
deleteForms.forEach(form => {
    form.addEventListener('submit', event => {
        event.preventDefault();
        const hasConfirmed = window.confirm('Confermi di voler eliminare il post?');
        if (hasConfirmed) form.submit();
    })
})