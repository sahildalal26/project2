<?php
$pageTitle = "Apply for Position - Digital Futures Learning Hub";
$currentPage = 'apply';  // Used for navigation highlighting
$bodyClass = 'apply-page';  // Used for page-specific styling

// Include header and navigation components
include 'header.inc';
include 'nav.inc';
?>

    <!-- Main content area with skip link target -->
    <main id="main-content" class="main">
      <div class="container">
        <!-- Page heading with decorative icon -->
        <h2>
          Job Application Form
          <span class="form-icon form-icon--document"></span>
        </h2>
        
        <!-- Form introduction and instructions -->
        <p class="form-intro">
          Complete the form below to submit your expression of interest. Fields
          marked with an asterisk (*) are required.
        </p>

        <!-- Client-side validation retained for Part 1. Part 2 moves validation to PHP -->
        <form
          class="application-form"
          method="POST"
          action="https://mercury.swin.edu.au/it000000/formtest.php"
        >
          <!-- Job Reference Section -->
          <div class="form-section">
            <div class="form-group">
              <label for="job-reference">Job Reference Number *</label>
              <input
                type="text"
                id="job-reference"
                name="job_reference"
                pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z0-9]{5}$"
                maxlength="5"
                required
                aria-describedby="job-reference-help"
                title="Enter exactly 5 characters with at least one letter and one number"
              />
              <small id="job-reference-help"
                >Enter exactly 5 alphanumeric characters</small
              >
            </div>
          </div>

          <!-- Personal Information Section -->
          <div class="form-section">
            <h3>Personal Information</h3>
            <!-- First Name Input -->
            <div class="form-group">
              <label for="first-name">First Name *</label>
              <input
                type="text"
                id="first-name"
                name="first_name"
                pattern="[A-Za-z]{1,20}"
                maxlength="20"
                required
              />
            </div>

            <!-- Last Name Input -->
            <div class="form-group">
              <label for="last-name">Last Name *</label>
              <input
                type="text"
                id="last-name"
                name="last_name"
                pattern="[A-Za-z]{1,20}"
                maxlength="20"
                required
              />
            </div>

            <!-- Date of Birth Input -->
            <div class="form-group">
              <label for="dob">Date of Birth *</label>
              <input
                type="text"
                id="dob"
                name="date_of_birth"
                pattern="\d{2}/\d{2}/\d{4}"
                placeholder="dd/mm/yyyy"
                required
                aria-describedby="dob-help"
              />
              <small id="dob-help">Format: dd/mm/yyyy</small>
            </div>

            <!-- Gender Selection Fieldset -->
            <fieldset class="form-group">
              <legend>Gender *</legend>
              <!-- Radio buttons for gender selection (required field) -->
              <div class="radio-group">
                <input
                  type="radio"
                  id="male"
                  name="gender"
                  value="male"
                  required
                />
                <label for="male">Male</label>
              </div>
              <div class="radio-group">
                <input
                  type="radio"
                  id="female"
                  name="gender"
                  value="female"
                  required
                />
                <label for="female">Female</label>
              </div>
              <div class="radio-group">
                <input
                  type="radio"
                  id="other"
                  name="gender"
                  value="other"
                  required
                />
                <label for="other">Other</label>
              </div>
            </fieldset>
          </div>

          <!-- Address Information Section -->
          <div class="form-section">
            <h3>Address Information</h3>
            <!-- Street Address Input -->
            <div class="form-group">
              <label for="street-address">Street Address *</label>
              <!-- Maximum 40 characters for street address -->
              <input
                type="text"
                id="street-address"
                name="street_address"
                maxlength="40"
                required
              />
            </div>

            <!-- Suburb/Town Input -->
            <div class="form-group">
              <label for="suburb">Suburb/Town *</label>
              <!-- Maximum 40 characters for suburb/town -->
              <input
                type="text"
                id="suburb"
                name="suburb"
                maxlength="40"
                required
              />
            </div>

            <!-- State Selection Dropdown -->
            <div class="form-group">
              <label for="state">State *</label>
              <select id="state" name="state" required>
                <option value="">Select a state</option>
                <option value="VIC">VIC</option>
                <option value="NSW">NSW</option>
                <option value="QLD">QLD</option>
                <option value="NT">NT</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="ACT">ACT</option>
              </select>
            </div>

            <!-- Postcode Input -->
            <div class="form-group">
              <label for="postcode">Postcode *</label>
              <input
                type="text"
                id="postcode"
                name="postcode"
                pattern="\d{4}"
                maxlength="4"
                required
                aria-describedby="postcode-help"
                title="Enter exactly four digits"
              />
              <small id="postcode-help">Enter exactly 4 digits</small>
            </div>
          </div>

          <!-- Contact Information Section -->
          <div class="form-section">
            <h3>Contact Information</h3>
            <!-- Email Address Input -->
            <div class="form-group">
              <label for="email">Email Address *</label>
              <input
                type="email"
                id="email"
                name="email"
                pattern="^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
                title="Enter a valid email such as name@example.com"
                required
              />
            </div>

            <!-- Phone Number Input -->
            <div class="form-group">
              <label for="phone">Phone Number *</label>
              <input
                type="tel"
                id="phone"
                name="phone"
                pattern="\d{8,12}"
                required
                aria-describedby="phone-help"
                title="Enter 8 to 12 digits"
              />
              <small id="phone-help">Enter 8-12 digits only</small>
            </div>
          </div>

          <!-- Skills Section -->
          <div class="form-section">
            <fieldset>
              <legend>Skills</legend>
              <div class="checkbox-group">
                <input type="checkbox" id="html" name="skills[]" value="HTML" />
                <label for="html">HTML</label>
              </div>
              <div class="checkbox-group">
                <input type="checkbox" id="css" name="skills[]" value="CSS" />
                <label for="css">CSS</label>
              </div>
              <div class="checkbox-group">
                <input
                  type="checkbox"
                  id="javascript"
                  name="skills[]"
                  value="JavaScript"
                />
                <label for="javascript">JavaScript</label>
              </div>
              <div class="checkbox-group">
                <input
                  type="checkbox"
                  id="python"
                  name="skills[]"
                  value="Python"
                />
                <label for="python">Python</label>
              </div>
              <div class="checkbox-group">
                <input type="checkbox" id="java" name="skills[]" value="Java" />
                <label for="java">Java</label>
              </div>
              <div class="checkbox-group">
                <input type="checkbox" id="php" name="skills[]" value="PHP" />
                <label for="php">PHP</label>
              </div>
              <div class="checkbox-group">
                <input
                  type="checkbox"
                  id="other-skills-check"
                  name="skills[]"
                  value="Other"
                />
                <label for="other-skills-check">Other skills...</label>
              </div>
            </fieldset>

            <!-- Other Skills Textarea -->
            <div class="form-group">
              <label for="other-skills">Other Skills (Please specify)</label>
              <textarea
                id="other-skills"
                name="other_skills"
                rows="4"
                cols="50"
                placeholder="Describe any additional skills not listed above..."
              ></textarea>
            </div>
          </div>

          <!-- Form Action Buttons -->
          <div class="form-actions">
            <!-- Submit button - sends form data to server -->
            <button type="submit" class="btn btn-primary">
              Submit Application
            </button>
            <!-- Reset button - clears all form fields -->
            <button type="reset" class="btn btn-secondary">Reset Form</button>
          </div>
        </form>
      </div>
    </main>

<?php 
// Include footer component
include 'footer.inc'; 
?>
