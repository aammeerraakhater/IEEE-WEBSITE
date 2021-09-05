 <?php        
  $style = "dashboard.css";
  $script= "dashboard.js";
  include 'init.php';
      ?> 
<div class="sidebar">
  <div class="logo-details">
    <i class='bx bxs-user icon'></i>
      <div class="logo_name">IEEE</div>
      <i class='bx bx-menu' id="btn" ></i>
  </div>
  <ul class="nav-list">
    <li>
        <i class='bx bx-search' ></i>
       <input type="text" placeholder="Search...">
       <span class="tooltip">Search</span>
    </li>
    <li>
      <a href="#">
        <i class='bx bx-grid-alt'></i>
        <span class="links_name">Dashboard</span>
      </a>
       <span class="tooltip">Dashboard</span>
    </li>
    <li>
     <a href="#">
       <i class='bx bx-user' ></i>
       <span class="links_name">User</span>
     </a>
     <span class="tooltip">User</span>
   </li>
   <li>
     <a href="#">
       <i class='bx bx-chat' ></i>
       <span class="links_name">Messages</span>
     </a>
     <span class="tooltip">Messages</span>
   </li>
   <li>
     <a href="#">
       <i class='bx  bx-user-circle' ></i>
       <span class="links_name">Members</span>
     </a>
     <span class="tooltip">Members</span>
   </li>
   <li>
     <a href="#">
       <i class='bx bx-folder' ></i>
       <span class="links_name">File Manager</span>
     </a>
     <span class="tooltip">Files</span>
   </li>
   <li>
     <a href="#">
       <i class='bx bx-cog' ></i>
       <span class="links_name">Setting</span>
     </a>
     <span class="tooltip">Setting</span>
   </li>
   <li class="profile">
       <div class="profile-details">
         <!-- change the picture -->
         <img src="images/user.png" alt="profileImg">
         <div class="name_job">
           <div class="name">Abdelrahman Maher</div>
           <div class="job">chairman</div>
         </div>
       </div>
       <i class='bx bx-log-out' id="log_out" ></i>
   </li>
  </ul>
</div>

<div class="maincontainer">
<div class="leftcontainer">
  <div class="leftcontainer_header">
      <span class="Main_text">Dashboard</span> 
      <div class="secondpartofheader">
      <span class="headertxt">General</span>
      <span class="headertxt">Documents</span>
      <span class="headertxt">notes</span>
      <i class='bx bx-dots-horizontal-rounded headertxt'></i>  

      </div>

  </div>
  <div class="analaticAndDocuments_category">
    <div class="analatic_category ">
    <div class="details_card">
    <div class="card_txt">All Members</div>
    <div class="card_number">530 Members</div>
    </div>

    <div class="details_card">
    <div class="card_txt">All Events</div>
    <div class="card_number">6 Events</div>
    </div>

    <div class="details_card">
    <div class="card_txt">All heads</div>
    <div class="card_number">6 Heads</div>
    </div>

    <div class="details_card">
    <div class="card_txt">All chairmen</div>
    <div class="card_number">6 chairmen</div>
    </div>
  </div>

    <div class="documents_category ">
      <div class="documents_card first">
      <div class="card_txt">Members documents</div>
      </div>

      <div class="documents_card second">
      <div class="card_txt">Events documents</div>
      </div>

      <div class="documents_card third">
      <div class="card_txt">Planning documents</div>
      </div>
    </div>

    </div>
    
  <div class="leftcontainer_cards row">
    <div class="card  middlepartcard" >
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
      <button class="letsGo">Let's go</button>
    </div>
    <div class="card  middlepartcard" >
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
      <button class="letsGo">Let's go</button>
    </div>
    <div class="card  middlepartcard" >
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
      <button class="letsGo">Let's go</button>

    </div>
    <div class="card  middlepartcard">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
      <button class="letsGo">Let's go</button>
    </div>
    <div class="card  middlepartcard" >
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
      <button class="letsGo">Let's go</button>
    </div>
    <div class="card  middlepartcard">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      </div>
      <button class="letsGo">Let's go</button>

    </div>

  </div>
</div>

<div class="rightcontainer">
<div class="firstpart">
  <div class="IEEEimage"></div>
  <div class="total_analatics">
    <div class="first analytics">
      <div class="upperpart">Total Messages</div>
      <div class="lowerpart">120</div>

    </div>
    <div class="second analytics">
      <div class="upperpart">condition</div>
      <div class="lowerpart">stable</div>

    </div>
  </div>
</div>
<hr>
<div class="secondpart">
  <div class="activity">
    <span class="firstActivityPart">Activity</span>
    <span class="secondActivityPart">More</span>
    </div>
    <div class="biggeractivityanalytics">
      <div class="activityAnalytics">
      <div class="upperpart">Total Messages</div>
      <div class="lowerpart">120</div>
    </div>
        <span class="analyticalNumbers">1234</span>
    </div>
    <div class="biggeractivityanalytics">
      <div class="activityAnalytics">
        <div class="upperpart">Total Messages</div>
        <div class="lowerpart">120</div>
      </div>
          <span class="analyticalNumbers">1234</span>
      </div>
      <div class="biggeractivityanalytics">
      <div class="activityAnalytics">
    <div class="upperpart">Total Messages</div>
    <div class="lowerpart">120</div>
    </div>
    <span class="analyticalNumbers">1234</span>
    </div>
    <div class="biggeractivityanalytics">
      <div class="activityAnalytics">
      <div class="upperpart">Total Messages</div>
      <div class="lowerpart">120</div>
    </div>
        <span class="analyticalNumbers">1234</span>
    </div>

    <div class="biggeractivityanalytics">
            <div class="activityAnalytics">
      <div class="upperpart">Total Messages</div>
      <div class="lowerpart">120</div>
    </div>
        <span class="analyticalNumbers">1234</span>
    </div>
 
</div>
<hr>
<div class="thirdpart">
  <span>Auto pay</span>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
  <span></span>
</div>
</div>
</div>
