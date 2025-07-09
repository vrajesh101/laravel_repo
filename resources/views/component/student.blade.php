@extends("layout.layout")

@section("title","Student")


@section("content")
<form id="student" method="POST" action="add-student">
    @csrf
    <div class="d-flex mt-5 mb-3">
        <label>Name</label>
        <input type="text" class="form-control w-25" id="name"></input>
    </div>
    <label class="mb-3">Subject</label>
    <div class="d-flex gap-5">
        <div>
            <input type="checkbox" id="Science" name="subjects" value="Science" class="form-check-input">
            <label for="Science"> Science</label><br>
        </div>
        <div>
            <input type="checkbox" id="Maths" name="subjects" value="Maths" class="form-check-input">
            <label for="Maths">Maths</label><br>
        </div>
        <div>
            <input type="checkbox" id="Art" name="subjects" value="Art" class="form-check-input">
            <label for="Art"> Art</label><br>
        </div>
        <div>
            <input type="checkbox" id="coding" name="subjects" value="coding" class="form-check-input">
            <label for="coding"> Coding</label><br>
        </div>
    </div>

    <div class="mt-4">
        <input type="radio" name="gender" value="male" id="male">
        <label for="male">Male</label>
        <input type="radio" name="gender" value="female" id="female">
        <label for="female">Female</label>
    </div>
    <div class="mt-5">
        <label>Age:</label>
        <input type="range" name="age" min="18" max="100" step="1">
    </div>

    <div class="d-flex mt-3 gap-3">
        <label>City :</label>
        <select name="city" id="city" class="form-control w-25">
            <option value="Delhi">Delhi</option>
            <option value="Rajkot">Rajkot</option>
            <option value="Mumbai">Mumbai</option>

        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-5">Submit</button>
</form>
@endsection

@push("scripts")
<script>
    let selectedSubject = [];
    $("#student").on("submit", function(e) {
        console.log($("#name").val());

        e.preventDefault()
        $('input[type="checkbox"]:checked').each(function() {
            selectedSubject.push($(this).val());
        });

        $.ajax({
            type: "POST",
            url: "{{route('add-student')}}",
            data: {
                "_token":"{{ csrf_token() }}",
                "name": $("#name").val(),
                "subject": selectedSubject.join(","),
                "gender": $('input[type="radio"]:checked').val(),
                "age": $('input[type="range"]').val(),
                "city": $("#city").val()

            },
            success: function(data) {
                $("#name").val("");
                $('input[name="subjects"]').prop('checked', false);
                $('input[name="gender"]').prop('checked', false);
                $("#age").val("0");
                $('#age').trigger('input');
                $("#city").val("rajkot");
            }

        })


    })
</script>

@endpush