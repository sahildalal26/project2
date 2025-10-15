<?php
$pageTitle = "Job Opportunities - Digital Futures Learning Hub";
$currentPage = 'jobs';
$bodyClass = 'jobs-page';
include 'header.inc';
include 'nav.inc';
?>

  <main id="main-content">
    <div class="container">
      <header class="jobs-intro" aria-describedby="jobs-subtitle">
        <h2 id="open-roles">Open Roles</h2>
        <p id="jobs-subtitle">
          Join a multidisciplinary team committed to elevating digital learning.
          Select a role to understand the impact, responsibilities, and
          requirements.
        </p>
      </header>

      <!-- Recruitment CTA: ensures quick access to application form -->
      <aside class="apply-aside" aria-label="Application call to action">
        <h2>Ready to Apply?</h2>
        <p>Have your job reference handy and submit an Expression of Interest.</p>
        <a href="apply.php" class="apply-button">Submit Your EOI</a>
      </aside>

      <!-- Role 1: Analytics-focused position supporting research evidence -->
      <section class="job-listing" aria-labelledby="role-research-analyst">
        <h3 id="role-research-analyst">Research Analyst</h3>
        <div class="job-meta">
          <span><strong>Reference:</strong> RA102</span>
          <span><strong>Salary:</strong> $78,000 – $90,000</span>
          <span><strong>Reports to:</strong> Head of Research Services</span>
        </div>
        <p>
          Support academic leaders by translating learning data into evidence
          based recommendations that improve student outcomes and research
          effectiveness.
        </p>

        <section aria-labelledby="ra-responsibilities">
          <h4 id="ra-responsibilities">Key Responsibilities</h4>
          <ol>
            <li>Collect, model, and visualise student learning data sets.</li>
            <li>Design evaluation frameworks for digital learning pilots.</li>
            <li>Produce accessible reports for executive stakeholders.</li>
            <li>Maintain secure data repositories and governance practices.</li>
          </ol>
        </section>

        <section aria-labelledby="ra-requirements">
          <h4 id="ra-requirements">Essential & Preferable Requirements</h4>
          <ul>
            <li><strong>Essential:</strong> Degree in Data Science, Statistics, or Learning Analytics.</li>
            <li><strong>Essential:</strong> Experience with SPSS, R, or Python for statistical modelling.</li>
            <li><strong>Preferable:</strong> Knowledge of higher education research practices.</li>
            <li><strong>Preferable:</strong> Ability to communicate complex findings to non technical audiences.</li>
          </ul>
        </section>
      </section>

      <!-- Role 2: Design-led role centred on learning experience design -->
      <section class="job-listing" aria-labelledby="role-learning-experience-designer">
        <h3 id="role-learning-experience-designer">Learning Experience Designer</h3>
        <div class="job-meta">
          <span><strong>Reference:</strong> LXD27</span>
          <span><strong>Salary:</strong> $82,000 – $94,000</span>
          <span><strong>Reports to:</strong> Director of Digital Learning Innovation</span>
        </div>
        <p>
          Partner with academic teams to architect inclusive, research-informed
          curricula, blending pedagogy, multimedia production, and user-focused
          design.
        </p>

        <section aria-labelledby="lxd-responsibilities">
          <h4 id="lxd-responsibilities">Key Responsibilities</h4>
          <ol>
            <li>Facilitate design sprints that convert learning goals into engaging digital experiences.</li>
            <li>Prototype multimedia assets and interactive learning activities.</li>
            <li>Coach academic staff on technology-enhanced teaching practices.</li>
            <li>Evaluate learning impact through analytics and user feedback.</li>
          </ol>
        </section>

        <section aria-labelledby="lxd-requirements">
          <h4 id="lxd-requirements">Essential & Preferable Requirements</h4>
          <ul>
            <li><strong>Essential:</strong> Qualification in Education, Learning Design, or similar.</li>
            <li><strong>Essential:</strong> Portfolio demonstrating inclusive digital learning design.</li>
            <li><strong>Preferable:</strong> Familiarity with LMS platforms and accessibility guidelines (WCAG).</li>
            <li><strong>Preferable:</strong> Experience with rapid prototyping tools (Figma, Articulate 360).</li>
          </ul>
        </section>
      </section>

      <!-- Role 3: Operational leadership role managing learning technology support -->
      <section class="job-listing" aria-labelledby="role-digital-support-lead">
        <h3 id="role-digital-support-lead">Digital Learning Support Lead</h3>
        <div class="job-meta">
          <span><strong>Reference:</strong> DSL45</span>
          <span><strong>Salary:</strong> $70,000 – $82,000</span>
          <span><strong>Reports to:</strong> Manager, Learning Technologies</span>
        </div>
        <p>
          Coordinate frontline support for our suite of learning technologies,
          ensuring academics and students have seamless digital learning
          experiences.
        </p>

        <section aria-labelledby="dsl-responsibilities">
          <h4 id="dsl-responsibilities">Key Responsibilities</h4>
          <ol>
            <li>Lead a support team handling LMS, video, and analytics tools.</li>
            <li>Document knowledge base articles and process improvements.</li>
            <li>Escalate incidents and maintain service level agreements.</li>
            <li>Deliver onboarding sessions for new digital platforms.</li>
          </ol>
        </section>

        <section aria-labelledby="dsl-requirements">
          <h4 id="dsl-requirements">Essential & Preferable Requirements</h4>
          <ul>
            <li><strong>Essential:</strong> Experience supporting enterprise learning technologies.</li>
            <li><strong>Essential:</strong> Strong stakeholder communication and problem solving skills.</li>
            <li><strong>Preferable:</strong> ITIL certification or equivalent service management experience.</li>
            <li><strong>Preferable:</strong> Exposure to scripting or automation for process efficiency.</li>
          </ul>
        </section>
      </section>
    </div>
  </main>

<?php include 'footer.inc'; ?>
