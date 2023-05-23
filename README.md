# Referral System

The referral system is a web-based application that allows users to create and manage referrals for medical services. It facilitates the seamless transfer of patients from one healthcare provider to another, ensuring efficient coordination and continuity of care.

## Features

-   **User Authentication**: The system provides user authentication functionality to ensure secure access to the referral system. Users can register, login, and manage their account credentials.
    
-   **Worklist**: The worklist displays a list of patients awaiting referral. It provides an overview of patients' information such as name, age, contact details, and referral status.
    
-   **Referral Form**: The referral form enables users to create new referral requests. It includes various sections for capturing patient details, next of kin information, referring officer details, service details, and additional notes.
    
-   **Dynamic Pre-filling**: When selecting a patient from the worklist, the referral form dynamically pre-fills the patient's information, such as name, gender, telephone number, ID number, county, and other demographics.
    
-   **Validation and Error Handling**: The system performs validation checks on form inputs to ensure data integrity and accuracy. It provides error messages and feedback to users for any incorrect or missing information.
    
-   **Submit and Processing**: Upon completing the referral form, users can submit the request. The system processes the referral request, performs necessary operations, and stores the referral details securely.
    

## Technologies Used

-   **Front-end**: The user interface is built using HTML, CSS, and JavaScript. It incorporates a responsive design to ensure compatibility across various devices.
    
-   **Backend**: The system utilizes the Laravel framework, a PHP-based web application framework, to handle server-side logic, database interactions, and API integrations.
    
-   **Database**: MySQL is used as the database management system to store and retrieve referral data. It provides data persistence and efficient querying capabilities.
    

## Installation

1.  Clone the repository: `git clone <repository-url>`
2.  Change directory to the system folder: `cd system`
3.  Install project dependencies: `composer install`
4.  Configure the database connection in the `.env` file.
5.  Run database migrations: `php artisan migrate`
6.  Start the development server: `php artisan serve`

## Contributing

Contributions are welcome! If you would like to contribute to the referral system project, please follow these steps:

1.  Fork the repository
2.  Create a new branch for your feature: `git checkout -b feature-name`
3.  Make the necessary changes and commit them: `git commit -m 'Add feature'`
4.  Push your changes to the branch: `git push origin feature-name`
5.  Submit a pull request explaining the changes you have made.

## License

This referral system is open-source and released under the [MIT License](https://chat.openai.com/c/LICENSE). Feel free to use, modify, and distribute the code as per the terms of the license.

## Contact

If you have any questions, suggestions, or feedback, please reach out to the project maintainers at tumhis@tum.ac.ke.


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

Thank you for using the referral system!
