<div class="table-responsive">
    <table id="studentList" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th class="center" style="width: 2%;">No</th>
                <th class="center">Photo</th>
                <th>Khmer Name</th>
                <th>English Name</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th >Batch</th>
                <th>Classroom</th>
                <th style="width:20%; !important;" class="center">Action</th>
            </tr>
        </thead>
            <tbody>

                        <?php $i=1;?>
                        @foreach($st as $stu)
                        <tr>
                            <td style="line-height: 50px;" class="center">{{$i++}}</td>
                            <td class="center"><img src='{{asset("photo/students/$stu->photo")}}' alt="no image" style="background: white;border:2px solid #00A6C7;border-radius: 50px;padding:1px;height: 50px; width: 50px;"></td>
                            <td style="line-height: 50px; font-family:'Khmer OS System',Serif;">{{$stu->khName}}</td>
                            <td style="line-height: 50px;">{{$stu->enName}}</td>
                            <td style="line-height: 50px;">{{($stu->gender==0 ? 'Female': 'Male')}}</td>
                            <td style="line-height: 50px;">{{$stu->phoneNum}}</td>
                            <td style="line-height: 50px;">{{$stu->generation->name}}</td>
                            <td style="line-height: 50px;">
                                @foreach($stu->classrooms as $cr)
                                    <span class="label label-default">{{$cr->name}}</span>
                                @endforeach
                            </td>
                            <td style="line-height: 50px" class="center">


                                <a href="#" onclick='editStudent("{{$stu->id}}")' style="padding: 5px;" data-toggle="modal" data-target="#myModal" title="edit"><i class="fa fa-edit"></i></a>
                                <a href="#" style="padding: 5px;" onclick='deleteStudent("{{$stu->id}}")'><i class="fa fa-trash" style="color: red;" title="Delete User"></i></a>
                                <a href="{{url('admin/student/view',$stu->id)}}" style="padding: 5px;"><i class="fa fa-eye" title="View User" style=""></i></a>

                            </td>
                    </tr>

            @endforeach
            </tbody>
    </table>
</div>
<script>
    $(function () {
        $('#studentList').DataTable();
    })
</script>