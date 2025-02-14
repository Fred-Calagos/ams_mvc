<div class="container mt-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/students"><i class='bx bx-user-circle bread-icon'></i>Student</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Create Student</li>
        </ol>
    </nav>
</div>
  
  <div class="container my-4">
    <div class="form-container">
      <form>
        <!-- Form Row 1 -->
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="schoolYear" class="form-label">School Year</label>
            <input type="text" class="form-control" id="schoolYear" name="schoolYear">
          </div>
          <div class="col-md-4">
            <label for="gradeLevel" class="form-label">Grade level</label>
            <input type="text" class="form-control" id="gradeLevel" name="gradeLevel">
          </div>
          <div class="col-md-4">
            <label for="gradeLevel" class="form-label">Section</label>
            <input type="text" class="form-control" id="gradeLevel" name="gradeLevel">
          </div>
          <div class="col-md-4">
            
          </div>
        </div>
        
        <!-- Form Row 2 -->
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="lrn" class="form-label">LRN</label>
            <input type="text" class="form-control" id="lrn" name="lrn">
          </div>
          <div class="col-md-4">
            <label for="psa" class="form-label">PSA Birth Certifate No.</label>
            <input type="text" class="form-control" id="psa" name="psa" placeholder="if available upon registration">
          </div>
          <div class="col-md-4">
            <label for="psa" class="form-label">RFID</label>
            <input type="text" class="form-control" id="psa" name="psa">
          </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <h5 class="section-divider">Learners Information</h5>
            </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName">
          </div>
          <div class="col-md-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName">
          </div>
          <div class="col-md-3">
            <label for="middleName" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="middleName" name="middleName">
          </div>
          <div class="col-md-3">
            <label for="extension" class="form-label">Extension</label>
            <input type="text" class="form-control" id="extension" name="extension" placeholder="e.g Jr., III">
          </div>
        </div>

        <div class="row mb-3">
          
          <div class="col-md-3">
            <label for="birthdate" class="form-label">Birthdate</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate">
          </div>
          <div class="col-md-3">
            <label for="placeOfBirth" class="form-label">Place of Birth</label>
            <input type="text" class="form-control" id="placeOfBirth" name="placeOfBirth">
          </div>
          <div class="col-md-3">
            <label for="placeOfBirth" class="form-label">Sex</label>
            <input type="text" class="form-control" id="placeOfBirth" name="placeOfBirth">
          </div>
          <div class="col-md-3">
            <label for="placeOfBirth" class="form-label">Mother Tongue</label>
            <input type="text" class="form-control" id="placeOfBirth" name="placeOfBirth">
          </div>
        </div>

        <!-- Form Row 3 -->
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="indigenousPeople" class="form-label">Belonging to Indigenous People</label>
            <select class="form-select" id="indigenousPeople" name="indigenousPeople">
              <option value="">Select</option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="beneficiary4ps" class="form-label">Beneficiary of 4Ps</label>
            <select class="form-select" id="beneficiary4ps" name="beneficiary4ps">
              <option value="">Select</option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="fourPsId" class="form-label">4Ps ID</label>
            <input type="text" class="form-control" id="fourPsId" name="fourPsId">
          </div>
        </div>

          <!-- ------------- -->

            <!-- Form Row for Learner with Disability -->
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="learnerDisability" class="form-label">Is the Child a Learner with Disability?</label>
                <select class="form-select" id="learnerDisability" name="learnerDisability" onchange="toggleDisabilityOptions()">
                  <option value="">Select</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
            </div>

            <!-- Form Row for Disability Options (Visible if 'Yes' is selected) -->
            <div class="row mb-3" id="disabilityOptions" style="display: none;">
              <div class="col-md-12">
                <label class="form-label">If Yes, specify the type of disability:</label>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="vision" name="disability[]" value="Special Health Problem/Chronic Disease" onchange="toggleSublist('vision', 'visionSublist')">
                      <label class="form-check-label" for="vision">Vision</label>
                    </div>

                    <div id="visionSublist" class="ms-4" style="display: none;">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="blind" name="disability[]" value="blind">
                        <label class="form-check-label" for="blind">a. Blind</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="lowVision" name="disability[]" value="lowVision">
                        <label class="form-check-label" for="lowVision">a. Low Vision</label>
                      </div>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="multipleDisorder" name="disability[]" value="Multiple Disorder">
                      <label class="form-check-label" for="multipleDisorder">Multiple Disorder</label>
                    </div>


                  </div>

                  <div class="col-md-3">

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="hearingImpairment" name="disability[]" value="Hearing Impairment">
                      <label class="form-check-label" for="hearingImpairment">Hearing Impairment</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="autism" name="disability[]" value="Autism Spectrum Disorder">
                      <label class="form-check-label" for="autism">Autism Spectrum Disorder</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="speechDisorder" name="disability[]" value="Speech/Language Disorder">
                      <label class="form-check-label" for="speechDisorder">Speech/Language Disorder</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="learningDisability" name="disability[]" value="Learning Disability">
                      <label class="form-check-label" for="learningDisability">Learning Disability</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="emotionalBehavioral" name="disability[]" value="Emotional Behavioral Disorder">
                      <label class="form-check-label" for="emotionalBehavioral">Emotional Behavioral Disorder</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="cerebralPalsy" name="disability[]" value="Cerebral Palsy">
                      <label class="form-check-label" for="cerebralPalsy">Cerebral Palsy</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="intellectualDisability" name="disability[]" value="Intellectual Disability">
                      <label class="form-check-label" for="intellectualDisability">Intellectual Disability</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="orthopedic" name="disability[]" value="Orthopedic/Physical Handicap">
                      <label class="form-check-label" for="orthopedic">Orthopedic/Physical Handicap</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="chronicDisease" name="disability[]" value="Special Health Problem/Chronic Disease" onchange="toggleSublist('chronicDisease', 'cancerSublist')">
                      <label class="form-check-label" for="chronicDisease">Special Health Problem/Chronic Disease</label>
                    </div>
                    <!-- Sublist for Cancer -->
                    <div id="cancerSublist" class="ms-4" style="display: none;">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cancer" name="disability[]" value="Cancer">
                        <label class="form-check-label" for="cancer">a. Cancer</label>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            </div>

          <!-- ------------- -->



        <div class="row mb-3">
            <div class="col-12">
                <h5 class="section-divider">Current Address</h5>
            </div>
        </div>

        <!-- Form Row 3 -->
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="indigenousPeople" class="form-label">House No.</label>
            <input type="text" class="form-control" id="fourPsId" name="fourPsId">
          </div>
          <div class="col-md-4">
            <label for="beneficiary4ps" class="form-label">Sitio/Street Name</label>
            <select class="form-select" id="beneficiary4ps" name="beneficiary4ps">
              <option value="">Select</option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="fourPsId" class="form-label">Province</label>
            <input type="text" class="form-control" id="fourPsId" name="fourPsId">
          </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
            <label for="fourPsId" class="form-label">Municipality</label>
            <input type="text" class="form-control" id="fourPsId" name="fourPsId">
          </div>
          <div class="col-md-4">
            <label for="fourPsId" class="form-label">Barangay</label>
            <input type="text" class="form-control" id="fourPsId" name="fourPsId">
          </div>
          <div class="col-md-4">
            <label for="fourPsId" class="form-label">Zip Code</label>
            <input type="text" class="form-control" id="fourPsId" name="fourPsId">
          </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <h5 class="section-divider">Permanent Address</h5>
            </div>
        </div>

        <!-- Form Row 3 -->
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="indigenousPeople" class="form-label">House No.</label>
            <input type="text" class="form-control" id="fourPsId" name="fourPsId">
          </div>
          <div class="col-md-4">
            <label for="beneficiary4ps" class="form-label">Sitio/Street Name</label>
            <select class="form-select" id="beneficiary4ps" name="beneficiary4ps">
              <option value="">Select</option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="fourPsId" class="form-label">Province</label>
            <input type="text" class="form-control" id="fourPsId" name="fourPsId">
          </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
            <label for="fourPsId" class="form-label">Municipality</label>
            <input type="text" class="form-control" id="fourPsId" name="fourPsId">
          </div>
          <div class="col-md-4">
            <label for="fourPsId" class="form-label">Barangay</label>
            <input type="text" class="form-control" id="fourPsId" name="fourPsId">
          </div>
          <div class="col-md-4">
            <label for="fourPsId" class="form-label">Zip Code</label>
            <input type="text" class="form-control" id="fourPsId" name="fourPsId">
          </div>
        </div>


        <div class="row mb-3">
            <div class="col-12">
                <h5 class="section-divider">PARENT'S/GUARDIAN INFORMATION</h5>
            </div>
        </div>

        <div class="row mb-3">
        <div class="col-12">
            <h6 class="sub-section-divider">Mother's Information</h6>
        </div>
        <div class="col-md-3">
            <label for="motherFirstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="motherFirstName" name="motherFirstName">
        </div>
        <div class="col-md-3">
            <label for="motherMiddleName" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="motherMiddleName" name="motherMiddleName">
        </div>
        <div class="col-md-3">
            <label for="motherLastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="motherLastName" name="motherLastName">
        </div>
        <div class="col-md-3">
            <label for="motherContact" class="form-label">Contact</label>
            <input type="text" class="form-control" id="motherContact" name="motherContact">
        </div>
        </div>

        <!-- Father's Information -->
        <div class="row mb-3">
        <div class="col-12">
            <h6 class="sub-section-divider">Father's Information</h6>
        </div>
        <div class="col-md-3">
            <label for="fatherFirstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="fatherFirstName" name="fatherFirstName">
        </div>
        <div class="col-md-3">
            <label for="fatherMiddleName" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="fatherMiddleName" name="fatherMiddleName">
        </div>
        <div class="col-md-3">
            <label for="fatherLastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="fatherLastName" name="fatherLastName">
        </div>
        <div class="col-md-3">
            <label for="fatherContact" class="form-label">Contact</label>
            <input type="text" class="form-control" id="fatherContact" name="fatherContact">
        </div>
        </div>

        <!-- Guardian's Information -->
        <div class="row mb-3">
            <div class="col-12">
                <h6 class="sub-section-divider">Guardian's Information</h6>
            </div>
            <div class="col-md-3">
                <label for="guardianFirstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="guardianFirstName" name="guardianFirstName">
            </div>
            <div class="col-md-3">
                <label for="guardianMiddleName" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="guardianMiddleName" name="guardianMiddleName">
            </div>
            <div class="col-md-3">
                <label for="guardianLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="guardianLastName" name="guardianLastName">
            </div>
            <div class="col-md-3">
                <label for="guardianContact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="guardianContact" name="guardianContact">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <h5 class="section-divider">For Returning Learner (Balik-Aral) and Those Who will Transfer/Move In</h5>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="guardianFirstName" class="form-label">Last Grade Level Completed</label>
                <input type="text" class="form-control" id="guardianFirstName" name="guardianFirstName">
            </div>
            <div class="col-md-3">
                <label for="guardianMiddleName" class="form-label">Last School Year Completed</label>
                <input type="text" class="form-control" id="guardianMiddleName" name="guardianMiddleName">
            </div>
            <div class="col-md-3">
                <label for="guardianLastName" class="form-label">Last School Attended</label>
                <input type="text" class="form-control" id="guardianLastName" name="guardianLastName">
            </div>
            <div class="col-md-3">
                <label for="guardianContact" class="form-label">School ID</label>
                <input type="text" class="form-control" id="guardianContact" name="guardianContact">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <h5 class="section-divider">For Learners in Senior High School</h5>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <label for="guardianFirstName" class="form-label">Semester</label>
                <input type="text" class="form-control" id="guardianFirstName" name="guardianFirstName">
            </div>
            <div class="col-md-5">
                <label for="guardianMiddleName" class="form-label">Track</label>
                <input type="text" class="form-control" id="guardianMiddleName" name="guardianMiddleName">
            </div>
            <div class="col-md-5">
                <label for="guardianLastName" class="form-label">Strand</label>
                <input type="text" class="form-control" id="guardianLastName" name="guardianLastName">
            </div>
        </div>

        <!-- ------------------- -->

        <div class="row mb-3">
            <div class="col-12">
                <p>If school will implement other distance learning modalities aside from face-to-face instruction, what would you prefer for your child?</p>
            </div>
        </div>

                    <!-- Form Row for Disability Options (Visible if 'Yes' is selected) -->
            <div class="row mb-3">
              <div class="col-md-12">
                <label class="form-label">Choose all that apply:</label>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="modularPrint" value="modularPrint">
                      <label class="form-check-label" for="modularPrint">Modular (print)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="modularDigital" value="modularDigital">
                      <label class="form-check-label" for="modularDigital">Modular (Digital)</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="online" name="online" value="online">
                      <label class="form-check-label" for="online">Online</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="educationalTelevision" name="educationalTelevision" value="educationalTelevision">
                      <label class="form-check-label" for="educationalTelevision">Educational Television</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="radioBasedIns" name="radioBasedIns" value="radioBasedIns">
                      <label class="form-check-label" for="radioBasedIns">Radio-Based Instruction </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="homeSchooling" name="homeSchooling" value="homeSchooling">
                      <label class="form-check-label" for="homeSchooling">Home Schooling</label>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="blended" name="blended" value="blended">
                      <label class="form-check-label" for="blended">Blended</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary w-100">Submit</button>
          </div>
        </div>
        

      </form>
    </div>
  </div>
