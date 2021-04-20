<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body>



	<div class="wrap-table ">
        <div class="del_msg"></div>
        <a class="btn btn-primary" id="modal_show" href="#">Add new</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>All Student</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Username</th>
							<th>Gender</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="all_student">






					</tbody>
				</table>
			</div>
		</div>
	</div>

{{--    student modal--}}

    <div id="add_stu_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Add New Student</h2>

                    <button class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="msg"></div>
                    <form id="stu_add_form" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input class="form-control" name="name" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" name="email" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Cell</label>
                            <input class="form-control" name="cell" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input class="form-control" name="username" type="text">
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <input  name="gender" value="Male" type="radio" id="male"><label for="male">Male</label>
                            <input  name="gender" value="Female" type="radio" id="female"><label for="female">Female</label>
                        </div>
                        <div class="form-group">
                            <label for="">Photo</label>
                            <input class="form-control-file" name="photo" type="file">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-sm btn-primary"  type="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


{{--          view modal--}}

    <div id="view_stu_modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="msg"></div>
                    <div class="profile">
                        <img id="image" src="" alt="">
                        <h2>Shahnewaj Sajib</h2>
                        <table class="table table-striped">
                            <tr>
                                <td>Name</td>
                                <td id="name">Name</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td id="email">Name</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td id="cell">Name</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td id="username">Name</td>
                            </tr>
                        </table>

                </div>
            </div>
        </div>
    </div>
    </div>

        {{--        edit modal--}}
        <div id="edit_stu_modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>EDIT Student</h2>

                        <button class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                        <div class="msg"></div>
                        <form id="stu_edit_form" action="" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="">Name</label>
                                <input class="form-control" name="name" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input class="form-control" name="email" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Cell</label>
                                <input class="form-control" name="cell" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input class="form-control" name="username" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Gender</label>
                                <input  name="gender" value="Male" type="radio" id="upmale"><label for="upmale">Male</label>
                                <input  name="gender" value="Female" type="radio" id="upfemale"><label for="upfemale">Female</label>
                            </div>
                            <div class="form-group">
                                <img style="max-width: 100%;" id="img" src="" alt="">
                                <label for="">Photo</label>
                                <input class="form-control-file" name="photo" type="file">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-sm btn-primary"  type="submit" value="update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>















        <!-- JS FILES  -->
        <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>


</body>
</html>
