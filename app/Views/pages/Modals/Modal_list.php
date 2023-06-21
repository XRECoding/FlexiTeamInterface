<!-- The Popup Modal -->
<div id="myModal" class="modal" data-keyboard="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">


            <div class="modal-body">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                <div class="input-group">
                                    <label class="input-group-text" for="disabledDropdown" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
                                            <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
                                        </svg>
                                    </label>
                                    <select class="form-select" id="disabledDropdown" style="width: 250px" onchange="init(this)"></select>
                                </div>

                            </ul>
                            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">

                                <li class="nav-item mx-1">
                                    <!-- Save Button -->
                                    <button type="button" class="btn btn-outline-dark" id="saveButton">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                        </svg>
                                        Save
                                    </button>
                                </li>

                                <li class="nav-item mx-1">
                                    <!-- Close / Cancel Button -->
                                    <button type="button" id="modalClose" class="btn btn-outline-dark" data-mdb-dismiss="modal" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                        </svg>
                                        Close
                                    </button>
                                </li>

                            </ul>

                        </div>
                    </div>
                </nav>

                <div class="container-fluid">
                    <div class="row h-100"  style="max-height: 85%">
                        <div class="col-3 col-xl-2 border" style="background-color: #F8F9FA; max-height: 100%">
                            <br>
                            <!-- Tab Nav bar -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="staff-tab" data-bs-toggle="tab" data-bs-target="#staff-tab-pane" type="button" role="tab" aria-controls="staff-tab-pane" aria-selected="true">Staff</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="resource-tab" data-bs-toggle="tab" data-bs-target="#resource-tab-pane" type="button" role="tab" aria-controls="resource-tab-pane" aria-selected="false">Resources</button>
                                </li>
                            </ul>
                            <!-- Tab Nav Bar Content -->
                            <div class="tab-content" id="myTabContent">
                                <!-- Staff Tab -->
                                <div class="tab-pane show active" id="staff-tab-pane" role="tabpanel" aria-labelledby="staff-tab" tabindex="0"> <!-- fade -->
                                    <br>
                                    <!-- Searchbar -->
                                    <div class="input-group rounded">
                                        <input type="search" id="staffInput" class="form-control rounded" placeholder="Search for Job or Name" aria-label="Search" aria-describedby="search-addon" />
                                        <span class="input-group-text border-0" id="search-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                                        </span>
                                    </div>

                                    <br>

                                    <!-- Staff Listing -->
                                    <div class="tableFixHead">
                                        <table class="sidebar"> <!-- class="table table-bordered table-striped" -->
                                            <thead>
                                            <tr>
                                                <th>Job</th>
                                                <th>Name</th>
                                            </tr>
                                            </thead>
                                            <tbody id="staffTable">
                                            <!-- Body gets filled with JS -->
                                            </tbody>
                                        </table>
                                    </div>

                                </div>


                                <!-- Resource Tab -->
                                <div class="tab-pane" id="resource-tab-pane" role="tabpanel" aria-labelledby="resource-tab" tabindex="1"> <!-- fade -->
                                    <br>
                                    <!-- Searchbar -->
                                    <div class="input-group rounded">
                                        <input type="search" id="resourceInput" class="form-control rounded" placeholder="Search for Resource" aria-label="Search" aria-describedby="search-addon" />
                                        <span class="input-group-text border-0" id="search-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                                        </span>
                                    </div>

                                    <br>

                                    <!-- Resource Listing -->
                                    <div class="tableFixHead">
                                        <table class="sidebar">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Number</th>
                                            </tr>
                                            </thead>
                                            <tbody id="resourceTable">
                                            <!-- Body gets filled with JS -->
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col p-0 m-0">

                            <br>

                            <!-- Progress Bar -->
                            <div class="progress" style="height: 2%;">
                                <div class="progress-bar" id="progressBar" role="progressbar" style="width: 100%; color: black; background-color: mediumpurple; font-size: 140%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Surgery</div>
                            </div>

                            <div class="row" style="margin-left: inherit; margin-right: inherit; margin-top: 3.85%; height: 88.4%" >
                                <div class="col h-100 border-end border-top border-bottom border-start">

                                    <div class="tab-content" id="myTabContent">
                                        <!-- Staff Tab -->
                                        <div class="tab-pane fade show active" id="staff-tab-pane-2" role="tabpanel" aria-labelledby="staff-tab" tabindex="0">

                                            <br>

                                            <!-- Staff Listing -->
                                            <div class="tableFixHead">
                                                <table class="mainPane"> <!-- class="table table-bordered table-striped" -->
                                                    <thead>
                                                    <tr>
                                                        <th>Job</th>
                                                        <th>Name</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="main-staffTable">
                                                    <!-- Body gets filled with JS -->
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <!-- Resource Tab -->
                                        <div class="tab-pane fade" id="resource-tab-pane-2" role="tabpanel" aria-labelledby="resource-tab" tabindex="1">

                                            <br>

                                            <!-- Resource Listing -->
                                            <div class="tableFixHead">
                                                <table class="mainPane">

                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Number</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="main-resourceTable">
                                                    <!-- Body gets filled with JS -->
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col h-100 border-end border-top border-bottom">
                                    <div class="container">


                                        <div class="shape oval" id="oval" style="text-align: center"></div>
                                        <div class="shape" id="square" style="text-align: center"></div>
                                        <div class="lineVerticalMiddle"></div>
                                        <div id="linesAndText"></div>
                                        <div class="shape octagon" id="octagon" style="text-align: center"></div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

