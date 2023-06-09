
               <!--
<div class="container-fluid h-100">
    <div class="row" style="height:5%">
        <div class="col-2 h-100 border-bottom border-end">




            <div class="d-flex align-items-center justify-content-evenly" style="margin-top: 16px">

                <button type="button" class="btn btn-outline-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg>
                    Save
                </button>


                <button type="button" class="btn btn-outline-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/></svg>
                    Submit
                </button>


                <button type="button" class="btn btn-outline-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/><path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/></svg>
                    Redo
                </button>
            </div>










        </div>
        <div class="col h-100 border-bottom">

            <select class="form-select" id="procedureDropdown" aria-label="Default select example" style="width: 40%; margin-top: 16px"></select>
          -->


    <nav class="navbar navbar-expand-lg navbar-light bg-light border" >
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">


        <li class="nav-item" style="margin-right: 5px;">
            <button type="button" class="btn btn-primary">Save</button>
        </li>
        
        <li class="nav-item" style="margin-right: 5px;">
            <button type="button" class="btn btn-primary">Upload</button>
        </li>

        <li class="nav-item" style="margin-right: 25px;">
            <button type="button" class="btn btn-primary">Undo</button>
        </li>


        <!-- <li class="nav-item">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" class="btn" style="background-color: #E9ECEF; border-color: rgba(0, 0, 0, 0.125); color: #000;">Save</button>
                <button type="button" class="btn" style="background-color: #E9ECEF; border-color: rgba(0, 0, 0, 0.125); color: #000;">Upload</button>
                <button type="button" class="btn" style="background-color: #E9ECEF; border-color: rgba(0, 0, 0, 0.125); color: #000;">Undo</button>
            </div>
        </li> -->



        <li class="nav-item">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1" data-toggle="modal" data-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
                            <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
                        </svg>
                    </span>
                </div>
                <select class="custom-select" id="inputGroupSelect03" style="width: 250px;" onchange="init(this)">
                    <option selected value="W01">W01</option>
                    <option value="W02">W02</option>
                    <option value="W03">W03</option>
                    <option value="W04">W04</option>
                    <option value="W05">W05</optSion>
                </select>
            </div>
        </li>
        

            <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <select class="form-select" id="procedureDropdown" aria-label="Default select example" style="width: 40%" onchange="init(this)">
                <option selected value="W01">W01</option>
                <option value="W02">W02</option>
                <option value="W03">W03</option>
                <option value="W04">W04</option>
                <option value="W05">W05</optSion>
            </select> -->

                    <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="javascript:$('#exampleModal').modal('show');">
            Info
        </button> -->

        </ul>
        <form class="form-inline my-2 my-lg-0">


                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"
                               href="#"
                               role="button"
                               data-bs-toggle="dropdown"
                               aria-expanded="false"
                            >
                                Christophe Severina
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">My Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                     </ul>
        </form>
        </div>


    </nav>


<div class="container-fluid h-100">
    <div class="row h-100" >
        <div class="col-2 h-100 border" style="background-color: #F8F9FA;">
            Sidebar
        </div>
        <div class="col h-100 p-0 m-0">
            <div id="myDiagramDiv" class="h-100 w-100"></div>
        </div>
    </div>
</div>


