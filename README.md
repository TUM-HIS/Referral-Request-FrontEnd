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

Thank you for using the referral system!
