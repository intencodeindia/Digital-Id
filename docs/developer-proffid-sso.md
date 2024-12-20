# Proffid SSO Integration Guide

This guide explains how to integrate and use Proffid's Single Sign-On (SSO) system in your application.

## Table of Contents
- [Overview](#overview)
- [Prerequisites](#prerequisites)
- [Integration Steps](#integration-steps)
- [API Reference](#api-reference)
- [Example Implementation](#example-implementation)
- [Security Considerations](#security-considerations)
- [Troubleshooting](#troubleshooting)

## Overview

Proffid SSO uses OAuth 2.0 protocol to provide secure authentication across multiple applications. It supports the Authorization Code flow, which is the most secure method for server-side applications.

### Key Features
- Single Sign-On across multiple applications
- OAuth 2.0 compliant
- Secure token management
- User information endpoint
- Customizable scopes

## Prerequisites

- Client ID and Client Secret from Proffid SSO admin panel
- SSL enabled endpoint for redirect URI
- PHP 8.1 or higher
- Composer

## Integration Steps

### 1. Register Your Application

Contact Proffid admin to register your application and obtain:
- Client ID
- Client Secret
- Allowed redirect URIs

### 2. Install Required Dependencies 

### 3. Implementation Example

#### Basic Authentication Flow
php
// Initialize the OAuth client
$config = [
'client_id' => 'your_client_id',
'client_secret' => 'your_client_secret',
'redirect_uri' => 'https://your-app.com/callback',
'auth_endpoint' => 'https://sso.proffid.com/oauth/authorize',
'token_endpoint' => 'https://sso.proffid.com/oauth/token',
'userinfo_endpoint' => 'https://sso.proffid.com/oauth/userinfo'
];
// Redirect to authorization page
public function redirectToSSO()
{
$params = [
'client_id' => $config['client_id'],
'redirect_uri' => $config['redirect_uri'],
'response_type' => 'code',
'scope' => 'email profile',
'state' => csrf_token()
];
return redirect($config['auth_endpoint'] . '?' . http_build_query($params));
}
// Handle the callback
public function handleCallback(Request $request)
{
if ($request->has('error')) {
return 'Error: ' . $request->error_description;
}
// Exchange code for token
$response = Http::post($config['token_endpoint'], [
'grant_type' => 'authorization_code',
'client_id' => $config['client_id'],
'client_secret' => $config['client_secret'],
'redirect_uri' => $config['redirect_uri'],
'code' => $request->code
]);
$token = $response->json()['access_token'];
// Get user information
$userInfo = Http::withToken($token)
->get($config['userinfo_endpoint'])
->json();
// Login or register user in your application
// ...
}


## API Reference

### Authorization Endpoint
- **URL**: `https://sso.proffid.com/oauth/authorize`
- **Method**: GET
- **Parameters**:
  - `client_id` (required)
  - `redirect_uri` (required)
  - `response_type` (required, must be 'code')
  - `scope` (optional)
  - `state` (recommended)

### Token Endpoint
- **URL**: `https://sso.proffid.com/oauth/token`
- **Method**: POST
- **Parameters**:
  - `grant_type` (required, must be 'authorization_code')
  - `client_id` (required)
  - `client_secret` (required)
  - `code` (required)
  - `redirect_uri` (required)

### User Info Endpoint
- **URL**: `https://sso.proffid.com/oauth/userinfo`
- **Method**: GET
- **Headers**:
  - `Authorization: Bearer {access_token}`

## Security Considerations

1. **Always use HTTPS** for all OAuth endpoints and redirect URIs

2. **Validate state parameter** to prevent CSRF attacks:

php:docs/developer-proffid-sso.md
if ($request->state !== session('oauth_state')) {
return 'Invalid state parameter';
}


3. **Store tokens securely**:
- Never expose tokens in URLs
- Store tokens in secure HTTP-only cookies or encrypted in database
- Implement proper token expiration handling

4. **Validate all input data**:

php
$request->validate([
'code' => 'required|string',
'state' => 'required|string'
]);


## Troubleshooting

### Common Issues

1. **Invalid redirect URI**
   - Ensure the redirect URI exactly matches the one registered
   - Check for protocol mismatch (http vs https)

2. **Invalid client credentials**
   - Verify client_id and client_secret
   - Check if the application is approved and active

3. **Token expired**
   - Implement proper token refresh mechanism
   - Check token expiration before use

### Error Responses
json
{
"error": "invalid_request",
"error_description": "The request is missing a required parameter"
}


### Debug Mode

Add `debug=true` to authorization request to get detailed error information (development only).

## Support

For technical support or questions:
- Email: support@proffid.com
- Documentation: https://docs.proffid.com
- GitHub Issues: https://github.com/proffid/sso/issues

## Updates and Changes

Check our [changelog](https://docs.proffid.com/changelog) for updates and breaking changes.