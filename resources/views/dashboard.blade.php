<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<x-app-layout>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>API Movies</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">API movie</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Find Movies</h3>
                            </div>
                            <form id="form_search">
                                <div class="card-body">
                                    {{-- <div class="container-fluid"> --}}
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="t">Title:</label>
                                                <input type="text" class="form-control" id="t" name="t" required
                                                    placeholder="Movie name">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="y">Year:</label>
                                                <input type="number" class="form-control" id="y"
                                                    placeholder="Year of release" name="y">
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Plot:</label>
                                                <select class="form-control" id="plot" name="plot">
                                                    <option value="none">Short</option>
                                                    <option value="full">Full</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="col-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Response:</label>
                                                <select class="form-control" id="r" name="r">
                                                    <option value="none">json</option>
                                                    <option value="xml">XML</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
                                    {{-- </div> --}}

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Response:</h3>
                                <div id="display_result">
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="col-12 pb-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List movies in DB</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Poster</th>
                                            <th>Year</th>
                                            <th>Rated</th>
                                            <th>Released</th>
                                            {{-- <th>Runtime</th> --}}
                                            <th>Genre</th>
                                            <th>Director</th>
                                            <th>
                                                <i class="fas fa-tasks"></i>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                        @foreach ($movies as $item)
                                            {{-- {{$item}} --}}
                                            <tr>
                                                <td>{{ $item->Title }}</td>
                                                <th><img src="{{ $item->Poster }}" class="w-50"></th>
                                                <td>{{ $item->Year }}</td>
                                                <td>{{ $item->Rated }}</td>
                                                <td>{{ $item->Released }}</td>
                                                {{-- <td>{{ $item->Runtime }}</td> --}}
                                                <td>{{ $item->Genre }}</td>
                                                <td>{{ $item->Director }}</td>
                                                <th class="d-flex justify-content-center">
                                                    <a href="/view/movie/{{$item->id}}"><i class="far fa-eye"></i></a>
                                                    <i class="fas fa-edit pl-2" onclick="editMovie({{ $item->id }})"></i>
                                                    <i class="far fa-trash-alt pl-2"
                                                        onclick="deleteMovie({{ $item->id }})"></i>
                                                </th>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Poster</th>
                                            <th>Year</th>
                                            <th>Rated</th>
                                            <th>Released</th>
                                            {{-- <th>Runtime</th> --}}
                                            <th>Genre</th>
                                            <th>Director</th>
                                            <th>
                                                <i class="fas fa-tasks"></i>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>

                    <div id="editForm" class="col-12 pb-5">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Movie detail</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" id="form_edit">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="Title" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Title" name="Title"
                                                placeholder="Title">
                                            <input id="movie_id" name="movie_id" type="number" hidden>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Actors" class="col-sm-2 col-form-label">Actors</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Actors" name="Actors"
                                                placeholder="Actors">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Awards" class="col-sm-2 col-form-label">Awards</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Awards" name="Awards"
                                                placeholder="Awards">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="BoxOffice" class="col-sm-2 col-form-label">BoxOffice</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="BoxOffice" name="BoxOffice"
                                                placeholder="Awards">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Country" class="col-sm-2 col-form-label">Country</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Country" name="Country"
                                                placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="DVD" class="col-sm-2 col-form-label">DVD</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="DVD" name="DVD"
                                                placeholder="date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Director" class="col-sm-2 col-form-label">Director</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Director" name="Director"
                                                placeholder="Director">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Genre" class="col-sm-2 col-form-label">Genre</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Genre" name="Genre"
                                                placeholder="Genre">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Language" class="col-sm-2 col-form-label">Language</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Language" name="Language"
                                                placeholder="Language">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Metascore" class="col-sm-2 col-form-label">Metascore</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="Metascore" name="Metascore"
                                                placeholder="Metascore">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Plot" class="col-sm-2 col-form-label">Plot</label>
                                        <div class="col-sm-10">
                                            <textarea type="texta" class="form-control" id="Plot" name="Plot">

                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Poster" class="col-sm-2 col-form-label">Poster</label>
                                        <div class="col-sm-10">
                                            <input type="url" class="form-control" id="Poster" name="Poster"
                                                placeholder="www.Poster.com/Poster_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Production" class="col-sm-2 col-form-label">Production</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Production" name="Production"
                                                placeholder="Production">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Rated" class="col-sm-2 col-form-label">Rated</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Rated" name="Rated"
                                                placeholder="Rated">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Released" class="col-sm-2 col-form-label">Released</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" id="Released" name="Released">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Runtime" class="col-sm-2 col-form-label">Runtime</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Runtime" name="Runtime">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Type" class="col-sm-2 col-form-label">Type</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Type" name="Type"
                                                placeholder="Type">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Website" class="col-sm-2 col-form-label">Website</label>
                                        <div class="col-sm-10">
                                            <input type="url" class="form-control" id="Website" name="Website"
                                                placeholder="Website">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Writer" class="col-sm-2 col-form-label">Writer</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Writer" name="Writer"
                                                placeholder="Writer">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Year" class="col-sm-2 col-form-label">Year</label>
                                        <div class="col-sm-10">
                                            <input type="number" min="1800" class="form-control" id="Year" name="Year"
                                                placeholder="Year">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="imdbID" class="col-sm-2 col-form-label">imdbID</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="imdbID" name="imdbID"
                                                placeholder="imdbID">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="imdbRating" class="col-sm-2 col-form-label">imdbRating</label>
                                        <div class="col-sm-10">
                                            <input type="number" step="0.01" class="form-control" id="imdbRating"
                                                name="imdbRating" placeholder="imdbRating">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="imdbVotes" class="col-sm-2 col-form-label">imdbVotes</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="imdbVotes" name="imdbVotes"
                                                placeholder="imdbVotes">
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">update</button>
                                    <button type="reset" class="btn btn-default float-right">reset</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                {{-- </div> --}}
                <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</x-app-layout>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function() {
        // console.log("ready!");
        $("#editForm").hide();

    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

    $('#form_search').on('submit', function(event) {
        event.preventDefault();
        let t = $('#t').val();
        let y = $('#y').val();
        y = (y == "") ? "none" : y;
        let plot = $('#plot').val();
        let r = $('#r').val();
        $.ajax({
            type: 'GET',
            url: '/search/api/' + t + '/' + y + '/' + plot + '/' + r,
            success: function(data) {
                if (r == "xml") {
                    // console.log(xmlToString(data));
                } else {
                    $("#display_result").html(
                        '<pre class="text-white" style="margin-bottom: 0px; white-space: normal;">' +
                        data +
                        '</pre> <buttom class="btn btn-primary" onclick="addApiToDB()">insert to DB</buttom>'
                    );
                }
                sessionStorage.setItem("data", data);
            },
            error: function(data) {
                // console.log("error", data);
            }
        });
    });

    function addApiToDB() {
        let data = sessionStorage.getItem("data")
        let new_data = JSON.parse(data)
        $.ajax({
            url: `/insert/api`,
            type: 'POST',
            data: new_data,
            dataType: 'JSON',
            success: function(res) {
                // console.log("success", res);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })

                let table = $('#example2').DataTable();
                table.row.add([
                    res['Title'],
                    '<img src="' + res['Poster'] + '" class="w-50">',
                    res['Year'],
                    res['Rated'],
                    res['Released'],
                    res['Genre'],
                    res['Director'],
                    '<a href="/view/movie/'+res['id']+'"><i class="far fa-eye"></i></a>'+
                    '<i class="fas fa-edit pl-2" onclick="editMovie(' + res['id'] + ')"></i>' +
                    '<i class="far fa-trash-alt pl-2" onclick="deleteMovie(' + res['id'] + ')"></i>'
                ]).draw(false);
            },
            error: function(ere) {
                // console.log("ere",ere);
            }
        })
    }



    function editMovie(id) {
        $("#editForm").show();
        $("html, body").animate({
            scrollTop: $('#editForm').offset().top
        }, 1500);

        $.ajax({
            type: 'GET',
            url: '/getmovie/' + id,
            success: function(data) {
                $("#movie_id").val(data['id']);
                $("#Title").val(data['Title']);
                $("#Actors").val(data['Actors']);
                $("#Awards").val(data['Awards']);
                $("#BoxOffice").val(data['BoxOffice']);
                $("#Country").val(data['Country']);
                $("#DVD").val(data['DVD']);
                $("#Director").val(data['Director']);
                $("#Genre").val(data['Genre']);
                $("#Language").val(data['Language']);
                $("#Metascore").val(data['Metascore']);
                $("#Plot").val(data['Plot']);
                $("#Poster").val(data['Poster']);
                $("#Production").val(data['Production']);
                $("#Rated").val(data['Rated']);
                $("#Released").val(data['Released']);
                $("#Runtime").val(data['Runtime']);
                $("#Type").val(data['Type']);
                $("#Website").val(data['Website']);
                $("#Writer").val(data['Writer']);
                $("#Year").val(data['Year']);
                $("#imdbID").val(data['imdbID']);
                $("#imdbRating").val(data['imdbRating']);
                $("#imdbVotes").val(data['imdbVotes']);
            },
            error: function(data) {
                // console.log("error", data);
                Swal.fire({
                    icon: 'error',
                    title: 'มีบางอย่างผิดพลาด...',
                    text: 'กรูณาลองใหม่!',
                }).then((result) => {
                location.reload(true)
                })
            }
        });
    }

    $('#form_edit').on('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        // console.log(formData.get('movie_id'));
        $.ajax({
            url: `/update/movie/`+formData.get('movie_id'),
            method: "post",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // console.log('success', response);
                Swal.fire({
                    icon: 'success',
                    title: 'ทำการแก้ไขแล้วเรียบร้อย...',
                }).then((result) => {
                    location.reload(true)
                })
            },
            error: function(response) {
                // console.log('error', response);
                Swal.fire({
                    icon: 'error',
                    title: 'มีบางอย่างผิดพลาด...',
                    text: 'กรูณาลองใหม่!',
                }).then((result) => {
                location.reload(true)
                })
            }
        })
    })

    function deleteMovie(id) {
        $('#example2').on("click", "i.fa-trash-alt", function() {
            // console.log($(this).parent());
            let table = $('#example2').DataTable();
            table.row($(this).parents('tr')).remove().draw(false);
        });
        $.ajax({
            url: `/delete/movie/` + id,
            type: 'delete',
            dataType: 'JSON',
            success: function(res) {},
            error: function(err) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
                location.reload();
            }
        })
    }

    function xmlToString(xmlData) {

        var xmlString;
        if (window.ActiveXObject) {
            xmlString = xmlData.xml;
        } else {
            xmlString = (new XMLSerializer()).serializeToString(xmlData);
        }
        return xmlString;
    }

</script>
