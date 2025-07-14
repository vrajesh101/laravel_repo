@extends("layout.layout")

@section("title","User")
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
@endpush


@section("content")



<button type="button" class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#adduserModal">
  Add User
</button>


<div class="modal fade" id="adduserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="adduser" method="POST" id="adduser">


          <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name" id="addname" class="form-control">
            <span id="addnameerror" class="text-danger"></span>
          </div>
          <div class="mb-2">
            <label>Email</label>
            <input type="text" name="email" id="addemail" class="form-control">
            <span id="addemailerror" class="text-danger"></span>
          </div>
          <div class="mb-2">
            <label>Age</label>
            <input type="text" name="age" id="addage" class="form-control">
            <span id="addageerror" class="text-danger"></span>

          </div>
          <div class="mb-2">
            <label>Contact No.</label>
            <input type="text" name="contactno" id="addcontactno" class="form-control">
            <span id="addcontactnoerror" class="text-danger"></span>
          </div>
          <button type="submit" class="btn btn-success">Add</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="edituserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="edituser" method="POST" id="edituser">
          @method('PUT')
          <input type="hidden" id="editid" name="id" value="">

          <div class="mb-2">
            <label>Name</label>
            <input type="text" id="editname" name="name" class="form-control">
            <span id="editnameerror" class="text-danger"></span>
          </div>
          <div class="mb-2">
            <label>Email</label>
            <input type="text" id="editemail" name="email" class="form-control">
            <span id="editemailerror" class="text-danger"></span>
          </div>
          <div class="mb-2">
            <label>Age</label>
            <input type="text" id="editage" name="age" class="form-control">
            <span id="editageerror" class="text-danger"></span>

          </div>
          <div class="mb-2">
            <label>Contact No.</label>
            <input type="text" id="editcontactno" name="contactno" class="form-control">
            <span id="editcontactnoerror" class="text-danger"></span>

          </div>
          <button type="submit" class="btn btn-warning">Edit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="d-flex">
  <label>Age</label>
  <select class="form-control w-25" id="age">
    <option value="">Select Age</option>
    <option value="10-30">10-30</option>
    <option value="31-40">31-40</option>
    <option value="41-50">41-50</option>
    <option value="51-60">51-60</option>
    <option value="61-70">61-70</option>
    <option value="71-80">71-80</option>
    <option value="81-90">81-90</option>
    <option value="91-100">91-100</option>

  </select>
</div>
<table id="user" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>age</th>
      <th>Contact No</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
@endsection

@push('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
@endpush

@push("scripts")
<script type="text/javascript">
  $(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  });
</script>
@endpush

@push('scripts')
<script type="text/javascript">
  $(function() {
    $("#user").DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "{{ route('userlist',['usertype'=>'admin']) }}",
        "data": function(d) {
          d.age = $('#age').val();
        }
      },
      "columns": [{
          data: 'id',
          name: 'id'
        },
        {
          data: 'name',
          name: 'name'
        },
        {
          data: 'email',
          name: 'email'
        },
        {
          data: 'age',
          name: 'age'
        },
        {
          data: 'contactno',
          name: 'contactno',
          render: function(contactno, obj1, obj2) {
            return contactno;
          }
        },
        {
          data: null,
          name: null,
          orderable: false,
          searchable: false,
          render: function(row) {
            return '<div id=' + row.id + '><button name="edit" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#edituserModal">Edit</button><button name="delete"  class="btn btn-danger btn-sm">Delete</button></div>'
          }
        }
      ]
    });

    $(document).on("click", "[name='delete']", function(e) {
      const id = $(this).parent().attr("id");
      $.ajax({
        type: "DELETE",
        url: "{{route('deleteuser',['usertype'=>'admin'])}}",
        data: {
          "id": id
        },
        success: function(data) {
          $("#user").DataTable().ajax.reload()
        }
      })
    })

    $(document).on("click", "[name='edit']", function(e) {
      const id = $(this).parent().attr("id");
      const baseUrl = window.location.origin;
      $.ajax({
        type: "GET",
        url: `${baseUrl}/users/userbyid/${id}?usertype=admin`,
        data: {
          "id": id
        },
        success: function(data) {

          console.log(data.id);

          $("#editname").val(data.name)
          $("#editemail").val(data.email)
          $("#editage").val(data.age)
          $("#editcontactno").val(data.contactno)
          $("#editid").val(data.id)

        }
      })


    })
    $("#age").on("change", function() {
      const val = $("#age").val();
      const baseUrl = window.location.origin;
      $("#user").DataTable().ajax.reload();
    })

  });
  $('#adduserModal').on('hidden.bs.modal', function(e) {
    $(this)
      .find("input")
      .val('')
      .end();
  })
  $('#edituserModal').on('hidden.bs.modal', function(e) {
    $(this)
      .find("input")
      .val('')
      .end();
  })
  $("#adduserModal").on('hide.bs.modal', function() {
    $("#addnameerror").text("");


    $("#addemailerror").text("");


    $("#addageerror").text("");

    $("#addcontactnoerror").text("");
  });
  $("#adduser").on("submit", function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "{{route('adduser',['usertype'=>'admin'])}}",
      data: {
        "name": $("#addname").val(),
        "age": $("#addage").val(),
        "email": $("#addemail").val(),
        "contactno": $("#addcontactno").val()
      },
      success: function(data) {
        $("#user").DataTable().ajax.reload();
        $('#adduserModal').modal('hide');
      },
      error: function(ajax) {
        const errors = ajax.responseJSON.errors;
        if (errors.name) {
          $("#addnameerror").text(errors.name[0]);
        }
        if (errors.email) {
          $("#addemailerror").text(errors.email[0]);
        }
        if (errors.age) {
          $("#addageerror").text(errors.age[0]);
        }
        if (errors.contactno) {
          $("#addcontactnoerror").text(errors.contactno[0]);
        }
      }
    })
  })
  $("#edituser").on("submit", function(e) {
    const baseUrl = window.location.origin;
    const id = $("#editid").val();
    console.log(id);

    e.preventDefault();
    $.ajax({
      type: "PUT",
      url: `${baseUrl}/users/edituser/${id}?usertype=admin`,
      data: {

        "name": $("#editname").val(),
        "age": $("#editage").val(),
        "email": $("#editemail").val(),
        "contactno": $("#editcontactno").val()
      },
      success: function(data) {

        $("#user").DataTable().ajax.reload();
        $('#edituserModal').modal('hide');

      },
      error: function(ajax) {
        const errors = ajax.responseJSON.errors;
        if (errors.name) {
          $("#editnameerror").text(errors.name[0]);
        }
        if (errors.email) {
          $("#editemailerror").text(errors.email[0]);
        }
        if (errors.age) {
          $("#editageerror").text(errors.age[0]);
        }
        if (errors.contactno) {
          $("#editcontactnoerror").text(errors.contactno[0]);
        }
      }
    })



    $("#edituserModal").on('hide.bs.modal', function() {
      $("#editnameerror").text("");


      $("#editemailerror").text("");


      $("#editageerror").text("");

      $("#editcontactnoerror").text("");
    });



  })
</script>
@endpush