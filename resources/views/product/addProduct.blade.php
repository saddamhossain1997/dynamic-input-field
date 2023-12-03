<!-- resources/views/dynamic-input/index.blade.php -->

<html>

<head>
    <title>Dynamic Input Example</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>

    </style>
</head>

<body>
    <h1>Dynamic Input Example</h1>

    @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="post" action="{{ route('productStore') }}">
        @csrf
        <label for="input_total">Name:</label>
        <input type="text" name="name" id="" required>
        <div id="dynamic">
            <!-- Initial input field -->

            <div class="d-none">
                <label for="input_total">Total:</label>
                <input type="text" name="total[]" id="total" required>
                <label for="input_name">Qty:</label>
                <input type="text" id="qty" name="qty[]" onchange="cal(this)" required>
                <label for="input_value">Price:</label>
                <input type="text" id="price" name="price[]" onchange="cal(this)" required>
                <button type="button" class="remove-input">Remove</button>
            </div>

        </div>
        <button type="button" id="add-input">Add Input</button>
        <button type="submit">Submit</button>
    </form>

    <script>
        // ==============calculator====================
        var inputClaculator = $("#dynamic");

        function cal(inputClaculator) {
            var index = $(inputClaculator).parent().index();
            var qty = document.getElementsByName("qty[]")[index].value;
            var price = document.getElementsByName("price[]")[index].value;
            var total = qty * price;
            document.getElementsByName("total[]")[index].value = total;
        }

        // jQuery code for adding and removing dynamic input fields
        $(document).ready(function() {

            $("#add-input").click(function() {
                var inputField = $("#dynamic div:first").clone();
                // var inputField = $("#dynamic").clone();
                inputField.find("input").val("");
                $("#dynamic").append(inputField);
                // $("#dynamic div").removeClass("d-none");


            });

            // Remove input field
            $("#dynamic").on("click", ".remove-input", function() {
                $(this).closest("div").remove();
            });



        });
    </script>
</body>

</html>