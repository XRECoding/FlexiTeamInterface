<!-- The Popup Modal -->
<div id="myModal" class="modal" data-keyboard="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Modal content Starts here-->
                <div class="container-fluid h-100">
                    <!-- Header Row -->
                    <div class="row" style="height:5%">
                        <!-- Left part of Header Row -->
                        <div class="col-2 h-100 border-bottom border-end">
                            <div class="d-flex align-items-center justify-content-evenly">
                                <!-- Save Button -->
                                <button type="button" class="btn btn-outline-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg>
                                    Save
                                </button>

                                <!-- Submit Button -->
                                <button type="button" class="btn btn-outline-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/></svg>
                                    Submit
                                </button>

                                <!-- Redo Button -->
                                <button type="button" class="btn btn-outline-dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/><path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/></svg>
                                    Redo
                                </button>
                            </div>
                        </div>

                        <!-- Right part of Header Row -->
                        <!-- Dropdown -->
                        <div class="col h-100 border-bottom">

<!--                            <select class="form-select" id="procedureDropdown" aria-label="Default select example" style="width: 40%"></select>-->
                        </div>

                        <!-- Profile Menu -->
<!--                        <div class="col h-100 border-bottom ml-auto col-auto">-->
<!--                            <nav class="navbar navbar-expand-lg bg-body-tertiary">-->
<!--                                <div class="container-fluid">-->
<!--                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">-->
<!--                                        <li class="nav-item dropdown">-->
<!--                                            <a class="nav-link dropdown-toggle"-->
<!--                                               href="#"-->
<!--                                               role="button"-->
<!--                                               data-bs-toggle="dropdown"-->
<!--                                               aria-expanded="false"-->
<!--                                            >-->
<!--                                                Christophe Severina-->
<!--                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/></svg>-->
<!--                                            </a>-->
<!--                                            <ul class="dropdown-menu">-->
<!--                                                <li><a class="dropdown-item" href="#">My Profile</a></li>-->
<!--                                                <li><a class="dropdown-item" href="#">Settings</a></li>-->
<!--                                                <li><a class="dropdown-item" href="#">Logout</a></li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                            </nav>-->
<!--                        </div>-->


                        <div class="col h-100 border-bottom ml-auto col-auto">
                            <!-- Save Button -->
                            <button type="button" class="btn btn-outline-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg>
                                Save
                            </button>

                            <!-- Close / Cancel Button -->
                            <button type="button" id="modalClose" class="btn btn-outline-dark" data-mdb-dismiss="modal" aria-label="Close">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16"><path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/></svg>
                                Close
                            </button>
                        </div>

                    </div>

                    <div class="row" style="height:95%">    <!-- change Sidebar Listing height here -->
                        <!-- Sidebar -->
                        <div class="col-2 h-100 border-end">
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
                                        <table> <!-- class="table table-bordered table-striped" -->
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
                                        <table>
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
                        <!-- Main Content -->
                        <div class="col h-100">

                            <br>

                            <!-- Progress Bar -->
                            <div class="progress" style="height: 2%;">
                                <div class="progress-bar" role="progressbar" style="width: 100%; background-color: mediumpurple; font-size: 140%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Surgery</div>
                            </div>

                            <div class="row" style="margin-left: inherit; margin-right: inherit; margin-top: 3.85%; height: 77%" >
                                <div class="col h-100 border-end border-top border-bottom border-start">

                                    <div class="tab-content" id="myTabContent">
                                        <!-- Staff Tab -->
                                        <div class="tab-pane fade show active" id="staff-tab-pane-2" role="tabpanel" aria-labelledby="staff-tab" tabindex="0">

                                            <br>

                                            <!-- Staff Listing -->
                                            <div class="tableFixHead">
                                                <table> <!-- class="table table-bordered table-striped" -->
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
                                                <table>
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

                                    <br>

                                    Workflow Ausschnitt Platzhalter







                                    <h2>Table 1:</h2>
                                    <div id="table1" >
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td>Table 1 First Row</td>
                                                <td>Table 1 First Row</td>
                                            </tr>
                                            <tr>
                                                <td>Table 1 Second Row</td>
                                                <td>Table 1 Second Row</td>
                                            </tr>
                                            <tr>
                                                <td>Table 2 First Row</td>
                                                <td>Table 1 Second Row</td>
                                            </tr>
                                            <tr>
                                                <td>Table 2 Second Row</td>
                                                <td>Table 1 Second Row</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr/>


                                    <h2>Table 2:</h2>
                                    <div id="table2">
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td>Table 2 First Row</td>
                                                <td>Table 1 Second Row</td>
                                            </tr>
                                            <tr>
                                                <td>Table 2 Second Row</td>
                                                <td>Table 1 Second Row</td>
                                            </tr>
                                            <tr>
                                                <td>Table 2 First Row</td>
                                                <td>Table 1 Second Row</td>
                                            </tr>
                                            <tr>
                                                <td>Table 2 Second Row</td>
                                                <td>Table 1 Second Row</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>







                                    <br>

                                </div>
                            </div>

                            <br>

                            <div class="row" style="margin-left: inherit; margin-right: inherit">
                                <div class="col h-100" style="text-align: right">
                                    <!-- Save Button -->
                                    <!--                                    <button type="button" class="btn btn-outline-dark">-->
                                    <!--                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg>-->
                                    <!--                                        Save-->
                                    <!--                                    </button>-->

                                    <!-- Close / Cancel Button -->
                                    <!--                                    <button type="button" id="modalClose" class="btn btn-outline-dark" data-mdb-dismiss="modal" aria-label="Close">-->
                                    <!--                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16"><path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/></svg>-->
                                    <!--                                        Close-->
                                    <!--                                    </button>-->
                                </div>

                            </div>

                        </div>





                    </div>

                </div>


            </div>
        </div>
    </div>
</div>