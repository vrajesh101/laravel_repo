@extends("layout.layout")

@section("title","Relationship")


@section("content")

<div class="mt-5">
    <button class="btn btn-primary mr-5" id="o-o">One to One</button>
    <button class="btn btn-warning mr-5" id="o-m">One to Many</button>
    <button class="btn bg-success mr-5">Many to One</button>
    <button class="btn  bg-info mr-5">Many to Many</button>
</div>

<textarea class="form-control mt-5 w-50"
    id="res"
    rows="5">
</textarea>
@endsection

@push("scripts")
<script>
    $(document).on("click", "#o-o", function() {
        const baseUrl = window.location.origin;

        $.ajax({
            type: "GET",
            url: `${baseUrl}/one-to-one?usertype=admin`,

            success: function(data) {
                $("#res").val("");

                data.forEach((data) => {
                    let text = $("#res").val();

                    $("#res").val(text + JSON.stringify(data));
                })
            }
        })
    })

    $(document).on("click", "#o-m", function() {
        const baseUrl = window.location.origin;

        $.ajax({
            type: "GET",
            url: `${baseUrl}/one-to-many?usertype=admin`,

            success: function(data) {
                $("#res").val("");

                data.forEach((data) => {
                    let text = $("#res").val();

                    $("#res").val(text + JSON.stringify(data));
                })
            }
        })
    })
</script>
@endpush