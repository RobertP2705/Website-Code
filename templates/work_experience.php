<?php
// templates/work_experience.php
?>
<section id="work-experience">
    <h2 class="section-title">Professional Work</h2>
    <div class="work-projects-showcase" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
        <div class="project-card" style="">
            <div class="project-content">
                <h3 class="project-title">Operator Page</h3>
                <p class="project-description">My most impactful project at Lake Cable, affecting hundreds of workers across all plants. The operator page is the one-stop suite for all machine operators on the plant. Running 24/7 on multiple desktops, this website holds all necessary information needed for operators through complex SQL queries and professional full-stack development. Also capabilities to modify length control, call down QA's, schedule downtimes and complete work orders.</p>
                
                <div class="project-media">
                    <div class="media-container">
                        <img src="assets/images/operator_page.png" 
                             alt="Operator Page Image" 
                             class="project-image">
                        <div class="media-overlay">
                            <div class="media-overlay-content">
                                <p class="image-description">Showcasing the operator page on one of dozens of machines. Currently hovered over a current order at D1_B</p>
                                <button class="media-button" 
                                        onclick="openModal('assets/images/operator_page.png', 'Showcasing the operator page on one of dozens of machines. Currently hovered over a current order at D1_B')">
                                    View Larger
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="project-tech">
                    <span class="tech-tag">PHP</span>
                    <span class="tech-tag">JS</span>
                    <span class="tech-tag">CSS</span>
                    <span class="tech-tag">SQL Server</span>
                    <span class="tech-tag">HTML</span>
                </div>
            </div>
        </div>
        <div class="project-card" style="">
            <div class="project-content">
                <h3 class="project-title">TV Scheduler System</h3>
                <p class="project-description">A comprehensive scheduling system for managing cable manufacturing operations across multiple production lines. The system provides real-time monitoring of machine statuses, production schedules, and order tracking. Features include color-coded status indicators, detailed run time calculations, and integrated compound tracking.</p>
                
                <div class="project-media">
                    <div class="media-container">
                        <img src="assets/images/tv_photo_1.png" 
                             alt="TV Scheduler Interface - Production Line View" 
                             class="project-image">
                        <div class="media-overlay">
                            <div class="media-overlay-content">
                                <p class="image-description">Real-time production line monitoring interface showing active schedules and machine statuses</p>
                                <button class="media-button" 
                                        onclick="openModal('assets/images/tv_photo_1.png', 'Real-time production line monitoring interface showing active schedules and machine statuses')">
                                    View Larger
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="media-container">
                        <img src="assets/images/tv_photo_2.png" 
                             alt="TV Scheduler Interface - Multiple Line View" 
                             class="project-image">
                        <div class="media-overlay">
                            <div class="media-overlay-content">
                                <p class="image-description">More pictures</p>
                                <button class="media-button" 
                                        onclick="openModal('assets/images/tv_photo_2.png', 'Real-time production line monitoring interface showing active schedules and machine statuses')">
                                    View Larger
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="project-tech">
                    <span class="tech-tag">PHP</span>
                    <span class="tech-tag">JavaScript</span>
                    <span class="tech-tag">SQL Server</span>
                    <span class="tech-tag">HTML/CSS</span>
                    <span class="tech-tag">Real-time Monitoring</span>
                </div>
            </div>
        </div>
        <div class="project-card" style="">
            <div class="project-content">
                <h3 class="project-title">Vitrek CSV Creation Script</h3>
                <p class="project-description">A sophisticated Python script designed to automate the creation of test CSV files for the Vitrek testing program. The script processes multiple variables including number of conductors, ground wire presence, test type, voltage, and duration to generate unique test configurations. Features include intelligent test parameter validation, comprehensive error handling, and a robust logging system for tracking file generation.</p>
                
                <div class="project-files">
                    <a href="assets/pdfs/Vitrek_WI.pdf" class="file-link" target="_blank">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" 
                             stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                        </svg>
                        Work Instructions Documentation
                    </a>
                    <a href="assets/pdfs/Decision_Tree_Vitrek.pdf" class="file-link" target="_blank">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" 
                             stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                        </svg>
                        Decision Tree Documentation
                    </a>
                </div>

                <div class="project-tech">
                    <span class="tech-tag">Python</span>
                    <span class="tech-tag">CSV Processing</span>
                    <span class="tech-tag">Data Validation</span>
                    <span class="tech-tag">Automation</span>
                    <span class="tech-tag">Technical Documentation</span>
                </div>
            </div>
        </div>
        <div class="project-card" style="">
            <div class="project-content">
                <h3 class="project-title">New Operator Sequence Page</h3>
                <p class="project-description">A front-end revamp of the operator sequence page. Fast navigation of jobs scheduled for each machine substantially increased the speed of scheduler's to schedule jobs.</p>
                <div class="project-media">
                    <div class="media-container">
                        <img src="assets/images/old_op_page.png" 
                             alt="Operator Page Image" 
                             class="project-image">
                        <div class="media-overlay">
                            <div class="media-overlay-content">
                                <p class="image-description">Old Op Seq page for reference</p>
                                <button class="media-button" 
                                        onclick="openModal('assets/images/old_op_page.png', 'Old Op Seq page for reference')">
                                    View Larger
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="demos/newOpSeqLive.php" class="demo-button">
                    View Live Demo
                </a>

                <div class="project-tech">
                    <span class="tech-tag">Frontend</span>
                    <span class="tech-tag">Data manipulation</span>
                    <span class="tech-tag">HTML</span>
                    <span class="tech-tag">JavaScript</span>
                    <span class="tech-tag">CSS</span>
                </div>
            </div>
            
        </div>
        <div class="project-card" style="">
            <div class="project-content">
                <h3 class="project-title">Tool Calibration System</h3>
                <p class="project-description">A system designed to be the main software for our quality engineers. Equipped with data inputs, data views, calendars and function saves.</p>
                
                <div class="project-media">
                    <div class="media-container">
                        <img src="assets/images/tool.png" 
                             alt="Tool Image" 
                             class="project-image">
                        <div class="media-overlay">
                            <div class="media-overlay-content">
                                <p class="image-description">Data view website showcasing multiple tools based on specific searches.</p>
                                <button class="media-button" 
                                        onclick="openModal('assets/images/tool.png', 'Data view website showcasing multiple tools based on specific searches.')">
                                    View Larger
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="media-container">
                        <img src="assets/images/search_tool.png" 
                             alt="Tool Image" 
                             class="project-image">
                        <div class="media-overlay">
                            <div class="media-overlay-content">
                                <p class="image-description">Search functionality that searches for a specific tool.</p>
                                <button class="media-button" 
                                        onclick="openModal('assets/images/search_tool.png', 'Search functionality that searches for a specific tool.')">
                                    View Larger
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="project-media">
                    <div class="media-container">
                        <img src="assets/images/function_tool.png" 
                             alt="Tool Image" 
                             class="project-image">
                        <div class="media-overlay">
                            <div class="media-overlay-content">
                                <p class="image-description">Data input for tests of each tool.</p>
                                <button class="media-button" 
                                        onclick="openModal('assets/images/function_tool.png', 'Data input for tests of each tool.')">
                                    View Larger
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="media-container">
                        <img src="assets/images/tool_list.png" 
                             alt="Tool Image" 
                             class="project-image">
                        <div class="media-overlay">
                            <div class="media-overlay-content">
                                <p class="image-description">List of tools in an excel format using html with proper file connection integration.</p>
                                <button class="media-button" 
                                        onclick="openModal('assets/images/tool_list.png', 'List of tools in an excel format using html with proper file connection integration.')">
                                    View Larger
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="project-tech">
                    <span class="tech-tag">PHP</span>
                    <span class="tech-tag">JS</span>
                    <span class="tech-tag">CSS</span>
                    <span class="tech-tag">mySQL</span>
                    <span class="tech-tag">HTML</span>
                </div>
            </div>
        </div>

        <div class="project-card" style="">
            <div class="project-content">
                <h3 class="project-title">Home page front end redesign</h3>
                <p class="project-description">A redesign to the home page of schedulers to schedule jobs more efficiently. Created from scratch by me. Demo uses dummy data.</p>
                
                <div class="project-media">
                    <div class="media-container">
                        <img src="assets/images/home_page.png" 
                             alt="Tool Image" 
                             class="project-image">
                        <div class="media-overlay">
                            <div class="media-overlay-content">
                                <p class="image-description">The home page I built in HTML/CSS/JS</p>
                                <button class="media-button" 
                                        onclick="openModal('assets/images/home_page.png', 'The home page I built in HTML/CSS/JS')">
                                    View Larger
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="project-files">
                    <a href="assets/pdfs/newHomePageDesign.png" class="file-link" target="_blank">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" 
                             stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                        </svg>
                        Early Brainstorm design created in Paint
                    </a>
                </div>

                <a href="demos/newHomePageWhiteWolf.php" class="demo-button">
                    View Live Demo
                </a>

                <div class="project-tech">
                    <span class="tech-tag">Frontend</span>
                    <span class="tech-tag">JS</span>
                    <span class="tech-tag">CSS</span>
                    <span class="tech-tag">Data</span>
                    <span class="tech-tag">HTML</span>
                </div>
            </div>
        </div>
    </div>
</section>