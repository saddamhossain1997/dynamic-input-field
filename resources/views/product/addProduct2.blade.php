<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>

    <div class="container">
        <div class="row">
            <button type="button">Add Input</button>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Handle</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total</th>

                        <th scope="col"><button type="button" class="" onclick="AddBtn()">Add</button></th>
                    </tr>
                </thead>
                <form action="{{route('productStore')}}" method="post">
                    @csrf
                    <tbody id="tbody">


                        <tr>
                            <td scope="row">1</td>

                            <td> <label for="input_name">Qty:</label>
                                <input type="text" name="qty[]" required>
                            </td>
                            <td>
                                <label for="input_value">Price:</label>
                                <input type="text" name="price[]" required>
                            </td>
                            <td> <label for="input_name">Total:</label>
                                <input type="text" name="total[]" required>
                            </td>
                            <td>
                                <button class="remove-input" id="" onclick="btnRemove(this)">Remove</button>
                            </td>

                        </tr>

                    </tbody>
                    <button type="submit">send</button>
                </form>

            </table>

        </div>
    </div>

    <script>
        function AddBtn() {
            var v = $("#tbody  tr:first").clone();
            v.find('input').val('');
            var v = $("#tbody").append(v);




        }

        function btnRemove(v) {
            $(v).parent().parent().remove();
        }

        // function cal(v) {

        //     var index = $(v).parent().parent().index();
        //     var qty = document.getElementsByName("qty[]")[index].value;
        //     var price = document.getElementsByName("price[]")[index].value;

        //     var total = qty * price;
        //     document.getElementsByName("total[]")[index].value = total;
        // }
    </script>

</body>

</html>