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

        <!-- Server-side validation in process_eoi.php -->
        <form
          class="application-form"
          method="POST"
          action="process_eoi.php"
          novalidate
        >
          <!-- Job Reference Section -->
          <div class="form-section">
            <div class="form-group">
              <label for="job-reference">Job Reference Number *</label>
              <input
                type="text"
                id="job-reference"
                name="job_reference"
                aria-describedby="job-reference-help"
              />
              <small id="job-reference-help"
                >Exactly 5 characters: mix of letters and numbers only (e.g., AB123)</small
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
                aria-describedby="first-name-help"
              />
              <small id="first-name-help">2-20 characters: letters, spaces, hyphens, or apostrophes only</small>
            </div>

            <!-- Last Name Input -->
            <div class="form-group">
              <label for="last-name">Last Name *</label>
              <input
                type="text"
                id="last-name"
                name="last_name"
                aria-describedby="last-name-help"
              />
              <small id="last-name-help">2-20 characters: letters, spaces, hyphens, or apostrophes only</small>
            </div>

            <!-- Date of Birth Input -->
            <div class="form-group">
              <label for="dob">Date of Birth *</label>
              <input
                type="text"
                id="dob"
                name="date_of_birth"
                placeholder="dd/mm/yyyy"
                aria-describedby="dob-help"
              />
              <small id="dob-help">Format: dd/mm/yyyy (must be 18+ years old)</small>
            </div>

            <!-- Gender Selection Fieldset -->
            <fieldset class="form-group">
              <legend>Gender *</legend>
              <!-- Radio buttons for gender selection -->
              <div class="radio-group">
                <input
                  type="radio"
                  id="male"
                  name="gender"
                  value="male"
                />
                <label for="male">Male</label>
              </div>
              <div class="radio-group">
                <input
                  type="radio"
                  id="female"
                  name="gender"
                  value="female"
                />
                <label for="female">Female</label>
              </div>
              <div class="radio-group">
                <input
                  type="radio"
                  id="other"
                  name="gender"
                  value="other"
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
              <input
                type="text"
                id="street-address"
                name="street_address"
                aria-describedby="street-address-help"
              />
              <small id="street-address-help">5-40 characters: letters, numbers, spaces, and basic punctuation only</small>
            </div>

            <!-- Suburb/Town Input -->
            <div class="form-group">
              <label for="suburb">Suburb/Town *</label>
              <input
                type="text"
                id="suburb"
                name="suburb"
                aria-describedby="suburb-help"
              />
              <small id="suburb-help">2-40 characters: letters, spaces, hyphens, apostrophes only</small>
            </div>

            <!-- State Selection Dropdown -->
            <div class="form-group">
              <label for="state">State *</label>
              <select id="state" name="state">
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
                aria-describedby="postcode-help"
              />
              <small id="postcode-help">Enter exactly 4 digits (Australian postcode)</small>
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
                aria-describedby="email-help"
              />
              <small id="email-help">Must be a valid email format (e.g., name@example.com)</small>
            </div>

            <!-- Phone Number Input -->
            <div class="form-group">
              <label for="phone">Phone Number *</label>
              <input
                type="tel"
                id="phone"
                name="phone"
                aria-describedby="phone-help"
              />
              <small id="phone-help">Enter 8-12 digits only (no spaces or special characters)</small>
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
