// $('#form_add_to_cart').submit(function (event) {
//     event.preventDefault(); // Ngăn chặn hành động mặc định của form
//     var formData = $(this).serialize(); // Thu thập dữ liệu từ form
//     $.ajax({
//         url: $(this).attr('action'), // Lấy URL từ thuộc tính action của form
//         type: $(this).attr('method'), // Lấy phương thức từ thuộc tính method của form
//         data: formData,
//         // success: function (response) {
//         //     alert('Product added to cart successfully!');
//         //     setTimeout(function () {
//         //         $('.alert').hide(); // $('.alert').fadeOut();
//         //     }, 1000);
//         // },
//         // error: function (xhr) {
//         // }
//     });
// });