<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard';
$route['privacy-policy'] = 'dashboard/privacy_policy';
$route['404_override'] = 'dashboard/error_404';
$route['translate_uri_dashes'] = FALSE;


/***********login************/
$route['Login']           ="Login/login";
$route['Logout']          ="Login/logout";
$route['forget_password'] = "Login/forgetPass";
$route['reset_password']  = "Login/resetPass";
/***********login************/

/***********user************/
$route['add-new-user']  = "Users/NewForm";
$route['update-user']  = "Users/updateForm";
$route['delete-user']  = "Users/delete";
$route['profile']  = "Users/profile";
/***********user************/

/***********product************/
$route['add-new-product']  = "Product/NewForm";
$route['update-product']  = "product/updateForm";
$route['delete-product']  = "product/delete";
/***********product************/

/***********services************/
$route['add-new-service']  = "Services/NewForm";
$route['update-service']  = "Services/updateForm";
$route['delete-service']  = "Services/delete";
/***********services************/


/***********news************/
$route['add-news']  = "news/NewForm";
$route['update-news']  = "news/updateForm";
$route['delete-news']  = "news/delete";
/***********news************/

/***********courses************/
$route['add-new-course']  = "Courses/NewForm";
$route['update-course']  = "Courses/updateForm";
$route['delete-course']  = "Courses/delete";
/***********courses************/

/***********settings************/
$route['add-settings']  = "Settings/NewForm";
$route['update-settings']  = "Settings/updateForm";
$route['delete-settings']  = "Settings/delete";
/***********settings************/

/***********news************/
$route['add-news']  = "News/NewForm";
$route['update-news']  = "News/updateForm";
$route['delete-news']  = "News/delete";
/***********news************/

/***********portfolios************/
$route['add-portfolio']  = "Portfolios/NewForm";
$route['update-portfolio']  = "Portfolios/updateForm";
$route['delete-portfolio']  = "Portfolios/delete";
/***********portfolios************/

/***********portfolioCategories************/
$route['add-portfolio-category']  = "Portfolio_categories/NewForm";
$route['update-portfolio-category']  = "Portfolio_categories/updateForm";
$route['delete-portfolio-category']  = "Portfolio_categories/delete";
/***********portfolioCategories************/

/***********UserRoles************/
$route['add-new-user-role']     = "User_roles/NewForm";
$route['update-user-role']      = "User_roles/updateForm";
$route['user-role-permission']  = "User_roles/PermissionsForm";
$route['delete-user-role']      = "User_roles/delete";
/***********UserRoles************/

/***********galleries************/
$route['add-new-galleries']  = "Galleries/NewForm";
$route['update-galleries']  = "Galleries/updateForm";
$route['delete-galleries']  = "Galleries/delete";
/***********galleries************/

/***********mailSettings************/
$route['add-new-mail-setting']  = "Email_settings/NewForm";
$route['update-mail-setting']  = "Email_settings/updateForm";
$route['delete-mail-setting']  = "Email_settings/delete";
/***********mailSettings************/
