<div class="col">
        <div class="form-group text-right">
            @if($application->participants->count() > 0)
                    <a id="sidebarCollapse" class="btn btn-primary text-white">
                        <i class="fe fe-eye"></i>
                        View Registered Participants
                    </a>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
            @endif
        </div>
</div>
<nav id="sidebar">
    <div id="dismiss">
        <i class="fe fe-x"></i>
    </div>
    <div class="sidebar-header">
        <h3>Participant List</h3>
    </div>
    <div class="container mt-5 ">
        <div class="row mx-auto">
            <div class="col-6">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Matrick</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</nav>