<?php
$pageTitle = "About Our Team - Digital Futures Learning Hub";
$currentPage = 'about';
$bodyClass = 'about-page';
$extraStyles = '
    <!-- EMBEDDED CSS EXAMPLE - Required for assignment -->
    <style>
      .team-highlight {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 24px;
        margin: 24px 0;
        box-shadow: 0 10px 30px rgba(19, 29, 54, 0.08);
      }
      .team-highlight h4 {
        color: var(--primary-dark);
        margin-top: 0;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 16px;
      }
      .team-highlight p {
        color: var(--primary-medium);
        line-height: 1.6;
      }
    </style>
';
include 'header.inc';
include 'nav.inc';
?>

    <main id="main-content">
      <div class="student-ids" aria-label="Student identification numbers">
        <h3>Student IDs</h3>
        <ul>
          <li><span class="student-name">Jesse Sadjoli</span> <span class="student-id">105346440</span></li>
          <li><span class="student-name">Shivansh Ahlawat</span> <span class="student-id">104441917</span></li>
          <li><span class="student-name">Sahil Dalal</span> <span class="student-id">103539251</span></li>
          <li><span class="student-name">Hasith Methsara</span> <span class="student-id">105012877</span></li>
        </ul>
      </div>

      <h2>About Our Team</h2>

      <!-- EMBEDDED CSS EXAMPLE - Using the team-highlight class defined in <style> above -->
      <div class="team-highlight" aria-labelledby="highlight-heading">
        <h4 id="highlight-heading">Team Excellence Recognition</h4>
        <p>
          Our team champions innovation in digital learning and research support.
          We combine user-centred design, analytics, and accessibility to deliver
          high-quality experiences for students and educators.
        </p>
      </div>

      <!-- INLINE CSS EXAMPLE - Required for assignment -->
      <div
        style="
          background: var(--surface);
          padding: 24px;
          border: 1px solid var(--border);
          border-radius: 8px;
          margin: 24px 0;
          text-align: center;
        "
      >
        <p
          style="
            color: var(--primary-dark);
            font-weight: 500;
            margin-bottom: 16px;
          "
        >
          This project demonstrates our collaborative approach to delivering a
          recruitment-ready web experience across HTML5, CSS3, and accessibility
          standards.
        </p>
        <p
          style="
            font-size: 14px;
            color: var(--accent);
            font-style: italic;
            margin: 0;
          "
        >
          Crafted with passion and dedication by Team Error404
        </p>
      </div>

      <section class="team-info" aria-labelledby="group-details">
        <h3 id="group-details">Group Details</h3>
        <dl>
          <dt>Group Name:</dt>
          <dd>Error404 - Web Technology Team</dd>

          <dt>Class Schedule:</dt>
          <dd>
            <ul>
              <li>
                Weekly Sessions
                <ul>
                  <li>Monday 11:30 AM – 12:30 PM (Lecture)</li>
                  <li>Thursday 2:30 PM – 4:30 PM (Tutorial)</li>
                </ul>
              </li>
            </ul>
          </dd>
        </dl>
      </section>

      <section class="member-profiles" aria-labelledby="member-profiles-heading">
        <h3 id="member-profiles-heading">Team Member Contributions</h3>
        <p class="section-description">
          Each member contributed to planning, designing, and implementing our
          recruitment site. Quotes highlight our shared values.
        </p>

        <dl class="contributions">
          <dt>Jesse Sadjoli</dt>
          <dd>
            <strong>Contributions:</strong> Developed index.html with company
            details, navigation, and footer. Contributed to styles.css. Set up
            Jira project management and repository links.
            <div class="member-quote">"The only constant in technology is change"</div>
            <strong>Favorite Programming Language:</strong>Python<br />
            <strong>Translation:</strong> "Satu-satunya yang konstan dalam teknologi adalah perubahan"
          </dd>

          <dt>Shivansh Ahlawat</dt>
          <dd>
            <strong>Contributions:</strong> Created jobs.html with semantic HTML
            structure, job descriptions, and aside elements.Contributed to
            styles.css.
            <div class="member-quote">"If it works don't touch it"</div>
            <strong>Favorite Programming Language:</strong>Python<br />
            <strong>Translation:</strong> "작동하면 건드리지 마세요"
          </dd>

          <dt>Sahil Dalal</dt>
          <dd>
            <strong>Contributions:</strong> Built apply.html with HTML5
            validation, created comprehensive CSS styling, and developed
            about.html. Contributed to styles.css. Managed project coordination
            by creating jira tickets and sprint planning and GitHub setup.
            <div class="member-quote">
              "The best code is written not for computers, but for humans to read."
            </div>
            <strong>Favorite Programming Language:</strong> Python<br />
            <strong>Translation:</strong> "Le meilleur code n'est pas écrit pour
            les ordinateurs, mais pour que les humains puissent le lire"
            (French)
          </dd>

          <dt>Hasith Methsara</dt>
          <dd>
            <strong>Contributions:</strong> [Assigned team profile content -
            work completed by Sahil Dalal]
            <strong>No work done.</strong>
          </dd>
        </dl>
      </section>

      <figure class="team-photo">
        <img src="images/team.png" alt="Digital Futures Learning Hub team" />
        <figcaption>Team Error404 celebrating a virtual milestone meeting.</figcaption>
      </figure>

      <section class="fun-facts" aria-labelledby="fun-facts-heading">
        <h3 id="fun-facts-heading">Team Fun Facts</h3>
        <table>
          <caption>
            Getting to Know Our Team
          </caption>
          <thead>
            <tr>
              <th scope="col">Team Member</th>
              <th scope="col">Dream Job</th>
              <th scope="col">Favourite Coding Snack</th>
              <th scope="col">Hometown</th>
              <th scope="col">Fun Fact</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td data-label="Team Member"><strong>Jesse Sadjoli</strong></td>
              <td data-label="Dream Job"><p>Pilot</p></td>
              <td data-label="Favorite Coding Snack"><p>Snakes</p></td>
              <td data-label="Hometown"><p>Melbourne</p></td>
              <td data-label="Fun Fact">
                <p>I can speak, read and write fluently in Indonesian</p>
              </td>
            </tr>
            <tr>
              <td data-label="Team Member">
                <strong>Shivansh Ahlawat</strong>
              </td>
              <td data-label="Dream Job">AWS cloud engineer</td>
              <td data-label="Favorite Coding Snack">Red bull</td>
              <td data-label="Hometown">Gurgoan</td>
              <td data-label="Fun Fact">I met prime Buddy franklin</td>
            </tr>
            <tr>
              <td data-label="Team Member"><strong>Sahil Dalal</strong></td>
              <td data-label="Dream Job">AI/ML Engineer</td>
              <td data-label="Favourite Coding Snack">Dark chocolate</td>
              <td data-label="Hometown">Delhi</td>
              <td data-label="Fun Fact">I love solving puzzles in my free time.</td>
            </tr>
          </tbody>
        </table>
      </section>
    </main>

<?php include 'footer.inc'; ?>
