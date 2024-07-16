<?php

// routes navigation 


return[
    // 'home' => ['AuthorizationController','homeview'],
    'signup' => ['AuthorizationController', 'signup'],
    'login' => ['AuthorizationController', 'login'],
    'patientDetails' => ['PatientController','bookAppointment'],
];