<x-slot name="script">
    <script>
        function deleteConfirm(id, type = 'delete') {
            Swal.fire({
                title: 'Вы уверены?',
                text: type == 'delete' ? "что хотите удалить эту запись!" : "что хотите восстановить эту запись",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: type == 'delete' ? "Да, удалить!" : "Да, восстановить!!",
                cancelButtonText: 'Нет, отменить!',

            }).then((result) => {
                if (result.isConfirmed) {
                    window.document.getElementById("item" + id).submit();
                }
            })
        }
    </script>
</x-slot>
