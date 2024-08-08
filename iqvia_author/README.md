# ****Iqvia Author Module****

## Overview

This module provides a custom entity named "Author" in Drupal 10 and exposes its data in JSON format.

## Task

- Create a custom Drupal 10 module for an “Author” entity.
- Expose the “Author” entity data through a JSON API.

## Details

1. Entity Definition:

- Entity Type: Author
- Fields:
   - Title (String)
   - Age (Integer, required)
   - API Key (String, required)

2. Field Constraints:

  - Age: Must be between 18 and 65.

3. Messages:

 - Display a meaningful message upon successful saving of "Author" data.

4. JSON API:

 - Expose the “Author” data using JSON API.
 - Use author_id as a query parameter and validate requests using the “API Key”.

## Dependencies

1. JSON API: Core module for JSON API support.
2. JSON API Resources: Contributed module to create custom JSON API resources.

## Implementation

1. Custom Entity:

- Created via Annotation Plugin with the name "Author".
- Includes fields: Name, Age, and API Key.

2. Field Validation:

- Age validation: Must be between 18 and 65, implemented using the Constraint API in the baseFieldDefinitions method of the Author class.

3. Entity Management:

- After installation, the Author entity collection is accessible at /author/list and under Content > Author's Listing.

4. JSON API Endpoint:

- Custom JSON API resource available at /jsonapi/author/content?author_id={author_id}&api_key={api_key}.
- Data retrieval is secured by validating the author_id and api_key. The data is only accessible if both are correct.

## **Installation**

1. Install the module using Composer or Drupal's admin interface.
2. Enable the module through the Drupal admin interface or Drush.

## **Usage**

- To add an Author, navigate to /author/list and use the form to create a new Author entity.
- To access Author data via JSON API, make a GET request to the endpoint with the required author_id and api_key.
