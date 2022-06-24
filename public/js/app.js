$(document).ready(function() {
    $(document).on('click', '.nav-link', function() {
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });
    $(".checkbox").change(function() {
        let isDone = this.checked ? 1 : 0;
        $.ajax({
            url: "update-status/" + this.id,
            type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "id": this.id,
                "is_done": isDone
            },
            success: function(res) {
                window.location.reload();
            },
            error: function(err, xhr) {
                console.log(err);
                console.log(xhr);
            }
        });
    });
    $(".remove-todo-item").click(function() {
        var listId = this.id;
        $.ajax({
            url: "delete-list/" + listId,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                "id": listId,
                "_method": 'DELETE',
            },
            success: function() {
                window.location.reload();
            }
        });
    });
    $(".remove-category").click(function() {
        swal({
            title: "Are you sure?",
            text: "Once deleted, it will also delete To Do List Item connected to this category!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "delete-category/" + this.id,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "id": this.id,
                        "_method": 'DELETE',
                    },
                    success: function() {
                        window.location.reload();
                    }
                });
            }
        });
    });
});