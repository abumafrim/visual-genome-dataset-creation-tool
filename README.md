# genome-dataset-creation-tool
 Available Data:
 - English Hausa Multimodal Genome Dataset (labeling in process)

 Hosting the application:
 - The application was developed using Laravel. To host, therefore, it is preferable to install laravel and host it using 'php arrisan serve'

 Uploading the task:
 - To upload a task, the 'Create task' form should be filled by giving the task name, source and target languages and the automatic translation tool used for documentation. Then the csv or Excel file containing the Visual Genome data in the Hindi Visual Genome format is uploaded.
 - NOTE: The images upload feature is not yet functional. Therefore, the images are not uploaded when creating the task. The image upload procedure is given below.

 Uploading the images:
 - To upload the images, the image files should be copied into the 'storage/app/public/photos' folder of the project.

 Linking images to task:
 - On the website home page, click on the drop-down menu icon and click on 'Create Storage Folder'

 Annotation:
 - Click on the task to annotate on the homepage.
 - On task page, click on the 'thumbs up' icon in the target language column if the automatic translation does not require any post-editing.
 - Click on the 'pencil' icon if the automatic translation requires a post-editing.
 
Miscellaneous
 - Keep track of the annotation progress of each task on the annotation homepage. 
