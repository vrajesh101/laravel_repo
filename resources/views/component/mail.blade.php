@extends("layout.layout")

@section("title","Mail")

@section("content")
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
</head>
<body>

<form method="POST" id="send-mail">
    <div class="mb-5 mt-5">
    <label>Email</label>
<input type="text" name="" id="mail" class="form-control w-25 ">
</div>
    <button class="btn btn-primary" >Send Mail</button>
    </form>
</body>
</html>
@endsection

@push('scripts')
<script>
     $(document).on("submit", "#send-mail", function(e) {
        e.preventDefault();
        const baseUrl = window.location.origin;

        $.ajax({
            type: "POST",
            url: `${baseUrl}/send-mail?usertype=admin`,
      data:{
                "_token":"{{ csrf_token() }}",
                 "email": $("#mail").val()
            },
            complete: function(data) {
                $("#mail").val("");
                 
            }
        })
    })
</script>

@endpush