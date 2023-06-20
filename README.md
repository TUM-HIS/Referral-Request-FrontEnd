<a name="readme-top"></a>

[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]

<br />
<div align="center">
<h3 align="center">Referral System</h3>
</div>
<br />

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
        <li><a href="#set-up">Set-up</a></li>
      </ul>
    </li>
    <li><a href="#Flowchart">Flowchart</a></li>
    <li><a href="#Use Case Diagram">Use Case Diagram</a></li>
    <li><a href="#Use Case Diagram">Activity Diagram</a></li>
    <li><a href="#Use Case Diagram">Data Flow Diagram</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

![Referral System Screen Shot][product-screenshot]

### Referral System

The referral system is a web-based application that allows users to create and manage referrals for medical services. It facilitates the seamless transfer of patients from one healthcare provider to another, ensuring efficient coordination and continuity of care.

_For more information, please refer to the [Documentation](docs.md)_

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With
* [![Laravel][Laravel.com]][Laravel-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/github_username/repo_name.git
   ```
2. Navigate into the system directory
   ```sh
   cd Referral-Request-FrontEnd/system
   ```  
3. Install dependencies - missing `composer packages`
   ```sh
   composer install
   ```  
4. Install NPM packages
   ```sh
   npm install
   ```
5. Create a .env file

   -  Copy content of the .env.example file
   -  Paste it in your .env file

6. Run
   ```sh
   php artisan key:generate
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Set-up

1. Setup Database Credentials in the .env file.
   -  DB_HOST=localhost
   -  DB_DATABASE=''
   -  DB_USERNAME=''
   -  DB_PASSWORD=''

2. Publish all the schema to the database.
   ```sh
   php artisan migrate
   ```  
3. Seed the database with dummy users.
   ```sh
   php artisan tinker
   User::factory()->count(5)->create()
   ```
4. Navigate to your browser and type “localhost/foldernameinHTdocs/” in the address bar to access the login page.
5. How to get the users' credentials
   -  Access your database
   -  Open the users table
   -  Copy any of the usernames and paste it in the login page - username section
   -  The password is, "password"
6. Create faker for user and roles
   -  Edit the roles table.
   -  Insert the role, guard_name, and the logged in user id in the role_id

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Flowchart

[![Patient Referral System Flowchart](https://camo.githubusercontent.com/4c6e7df670a663d3dfc14946ff20ba845cc0a423ebd4ed55d5dc4b8ac6e88ce0/68747470733a2f2f696d6167657374756d2e626c6f622e636f72652e77696e646f77732e6e65742f6469616772616d732f466c6f7725323063686172742e706e67)](https://camo.githubusercontent.com/4c6e7df670a663d3dfc14946ff20ba845cc0a423ebd4ed55d5dc4b8ac6e88ce0/68747470733a2f2f696d6167657374756d2e626c6f622e636f72652e77696e646f77732e6e65742f6469616772616d732f466c6f7725323063686172742e706e67)

The flowchart shows the high-level process flow for the patient referral system. The process begins with client registration, and continues with the capture of medical information and clinical summary. A referral is then created, and the referral status is tracked until feedback is received.

## [](https://github.com/ernestnash/Referal_module#use-case-diagram)Use Case Diagram

[![Patient Referral System Use Case Diagram](https://camo.githubusercontent.com/b58326dc63821ceb16a80f70761f3ab38117cbf94d61f1dad47ae22aa1bbbac7/68747470733a2f2f696d6167657374756d2e626c6f622e636f72652e77696e646f77732e6e65742f6469616772616d732f526566657272616c25323076657273696f6e253230322d5573652d636173652532306469616772616d2e64726177696f2532302832292e706e67)](https://camo.githubusercontent.com/b58326dc63821ceb16a80f70761f3ab38117cbf94d61f1dad47ae22aa1bbbac7/68747470733a2f2f696d6167657374756d2e626c6f622e636f72652e77696e646f77732e6e65742f6469616772616d732f526566657272616c25323076657273696f6e253230322d5573652d636173652532306469616772616d2e64726177696f2532302832292e706e67)

The use case diagram shows the different actors that interact with the patient referral system and the use cases that they can perform. The actors include the client, referring health worker, referral coordinator, receiving facility and shared health record

## [](https://github.com/ernestnash/Referal_module#activity-diagram)Activity Diagram

[![Patient Referral System Flowchart](https://camo.githubusercontent.com/5387418fb78d8aa7ce48b20fe7f7462d3770526ef4fc640a4560b787e138370f/68747470733a2f2f696d6167657374756d2e626c6f622e636f72652e77696e646f77732e6e65742f6469616772616d732f526566657272616c25323076657273696f6e253230322d506167652d362e64726177696f2e706e67)](https://camo.githubusercontent.com/5387418fb78d8aa7ce48b20fe7f7462d3770526ef4fc640a4560b787e138370f/68747470733a2f2f696d6167657374756d2e626c6f622e636f72652e77696e646f77732e6e65742f6469616772616d732f526566657272616c25323076657273696f6e253230322d506167652d362e64726177696f2e706e67)

The flowchart shows the high-level process flow for the patient referral system. The process begins with client registration, and continues with the capture of medical information and clinical summary. A referral is then created, and the referral status is tracked until feedback is received.

## [](https://github.com/ernestnash/Referal_module#data-flow-diagram)Data Flow Diagram

[![Patient Referral System Data Flow Diagram](https://camo.githubusercontent.com/362bcd78c11ced03fe1282a136ceed85eda779c8af27ff941a28ce76115a567c/68747470733a2f2f696d6167657374756d2e626c6f622e636f72652e77696e646f77732e6e65742f6469616772616d732f5768617473417070253230496d616765253230323032332d30342d31342532306174253230322e35302e3136253230504d2e6a706567)](https://camo.githubusercontent.com/362bcd78c11ced03fe1282a136ceed85eda779c8af27ff941a28ce76115a567c/68747470733a2f2f696d6167657374756d2e626c6f622e636f72652e77696e646f77732e6e65742f6469616772616d732f5768617473417070253230496d616765253230323032332d30342d31342532306174253230322e35302e3136253230504d2e6a706567)

The data flow diagram shows the flow of information in the patient referral system. The system captures information about clients, medical information, referrals, and feedback, and stores this information in a database. The information is then used to generate reports and provide feedback to the referring health worker.)

The activity diagram shows the detailed process flow for creating a referral in the patient referral system. The process begins with the creation of a new referral, and continues with the selection of the referral priority, entry of the diagnosis and reason for referral, selection of the physician/provider, and submission of the referral. The process concludes with the tracking of the referral status until feedback is received.



<!-- CONTRIBUTING -->
## Contributing

If you have a suggestion that would make this better, please fork the repo and create a pull request. Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature-name`)
3. Commit your Changes (`git commit -m 'Add Feature'`)
4. Push to the Branch (`git push origin feature-name`)
5. Submit a pull request explaining the changes you have made.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- LICENSE -->
## License

This referral system is open-source and released under the [MIT License](https://chat.openai.com/c/LICENSE). Feel free to use, modify, and distribute the code as per the terms of the license.
<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTACT -->
## Contact

If you have any questions, suggestions, or feedback, please reach out to the project maintainers at tumhis@tum.ac.ke.

Thank you for using the referral system!

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/TUM-HIS/Referral-Request-FrontEnd.svg?style=for-the-badge
[contributors-url]: https://github.com/TUM-HIS/Referral-Request-FrontEnd.git/contributors

[forks-shield]: https://img.shields.io/github/forks/TUM-HIS/Referral-Request-FrontEnd.svg?style=for-the-badge
[forks-url]: https://github.com/TUM-HIS/Referral-Request-FrontEnd.git/network/members

[stars-shield]: https://img.shields.io/github/stars/TUM-HIS/Referral-Request-FrontEnd.svg?style=for-the-badge
[stars-url]: https://github.com/TUM-HIS/Referral-Request-FrontEnd.git/stargazers

[issues-shield]: https://img.shields.io/github/issues/TUM-HIS/Referral-Request-FrontEnd.svg?style=for-the-badge
[issues-url]: https://github.com/TUM-HIS/Referral-Request-FrontEnd-Template/issues

[product-screenshot]: images/screenshot.png

[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com

[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
