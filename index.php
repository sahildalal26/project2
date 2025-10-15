<?php
$pageTitle = "Digital Futures Learning Hub";
$currentPage = 'home';  // Used for navigation highlighting
$bodyClass = 'home-page';  // Used for page-specific styling

// Include header and navigation components
include 'header.inc';
include 'nav.inc';
?>

    <!-- Main content area with skip link target -->
    <main id="main-content">
      <div class="container">
        <!-- HERO: Reinforces recruitment focus in response to feedback -->
        <section id="home" class="hero" aria-labelledby="home-title">
          <!-- Hero Content: Main messaging and value proposition -->
          <div class="hero__content">
            <h2 id="home-title">Shape the Future of Digital Learning</h2>
            <!-- Introduction to the organization and recruitment focus -->
            <p>
              Digital Futures Learning Hub is the university's centre of
              excellence for technology-enhanced education. We recruit
              specialists who combine pedagogy, analytics, and design to create
              outstanding learning experiences for our academic community.
            </p>
            <!-- Key highlights of working here -->
            <ul class="hero__highlights" aria-label="Recruitment highlights">
              <li>Permanent and contract roles in instructional innovation</li>
              <li>Research-backed projects with cross-faculty collaboration</li>
              <li>Mentoring, continuous learning, and hybrid work options</li>
            </ul>
            <!-- Primary call-to-action button -->
            <a class="btn btn-primary" href="jobs.php">Browse Open Roles</a>
          </div>
          
          <!-- Hero Figure: Supporting image with caption -->
          <figure class="hero__figure">
            <img
              src="images/building.jpeg"
              alt="Team collaborating with digital learning tools"
            />
            <figcaption>
              Our Digital Learning Building fosters innovation and collaboration.
            </figcaption>
          </figure>
        </section>

        <!-- VALUE PROPOSITION: Summaries what we offer to candidates -->
        <section id="services" class="services" aria-labelledby="services-title">
          <h3 id="services-title">Why Join Digital Futures?</h3>
          <p class="services__intro">
            We blend strategy, research, and creativity to transform digital
            learning. Here's how successful applicants contribute from day one:
          </p>
          
          <!-- Service Cards Grid: Showcasing key work areas -->
          <div class="services__grid">
            <!-- Service Card: Instructional Design -->
            <article class="service-card">
              <h4>Instructional Design</h4>
              <p>
                Partner with faculty to reimagine courses, integrate multimedia,
                and deliver inclusive learning journeys.
              </p>
            </article>
            
            <!-- Service Card: Learning Analytics -->
            <article class="service-card">
              <h4>Learning Analytics</h4>
              <p>
                Translate engagement data into actionable insights that improve
                student success.
              </p>
            </article>
            
            <!-- Service Card: Research Enablement -->
            <article class="service-card">
              <h4>Research Enablement</h4>
              <p>
                Drive evidence-based practice and support grant-funded
                investigations into emerging education technologies.
              </p>
            </article>
            
            <!-- Service Card: Staff Capability -->
            <article class="service-card">
              <h4>Staff Capability</h4>
              <p>
                Lead workshops, communities of practice, and bespoke coaching to
                uplift digital literacy across the university.
              </p>
            </article>
          </div>
        </section>

        <!-- QUICK LINKS: Direct pathways into recruitment pipeline -->
        <section id="next-steps" class="next-steps" aria-labelledby="next-steps-title">
          <h3 id="next-steps-title">Ready to Apply?</h3>
          <!-- Cards for quick navigation to key pages -->
          <div class="next-steps__cards">
            <!-- Card: View job openings -->
            <article class="card" aria-labelledby="featured-roles">
              <h4 id="featured-roles">Featured Roles</h4>
              <p>Explore our current vacancies in analytics, design, and teaching support.</p>
              <a class="btn btn-secondary" href="jobs.php#open-roles">View Positions</a>
            </article>
            
            <!-- Card: Submit application -->
            <article class="card" aria-labelledby="prepare-application">
              <h4 id="prepare-application">Prepare Your Application</h4>
              <p>Review our selection criteria and submit an expression of interest.</p>
              <a class="btn btn-secondary" href="apply.php">Submit EOI</a>
            </article>
            
            <!-- Card: Learn about the team -->
            <article class="card" aria-labelledby="connect-team">
              <h4 id="connect-team">Connect with the Team</h4>
              <p>Meet the people driving our digital learning transformation.</p>
              <a class="btn btn-secondary" href="about.php">Meet Us</a>
            </article>
          </div>
        </section>
      </div>
    </main>

<?php 
// Include footer component
include 'footer.inc'; 
?>
