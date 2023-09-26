## Installtion

<p>Clone the repository</p>  
<div class="snippet-clipboard-content notranslate position-relative overflow-auto">
    <pre class="notranslate">
        <code>git clone git@github.com:kvnpayas/Admin-dashboard.git</code>
    </pre>
</div>

<p>Switch repo folder</p>
<div class="snippet-clipboard-content notranslate position-relative overflow-auto">
    <pre class="notranslate">
        <code>cd laravelBreezeAdmin</code>
    </pre>
</div>

<p>Install all the dependencies using composer</p>
<div class="snippet-clipboard-content notranslate position-relative overflow-auto">
    <pre class="notranslate">
        <code>composer install</code>
    </pre>
</div>

<p>Copy the example env file and make the required configuration changes in the .env file</p>
<div class="snippet-clipboard-content notranslate position-relative overflow-auto">
    <pre class="notranslate">
        <code>cp .env.example .env</code>
    </pre>
</div>

<p>Run the database migrations and seeder (Set the database connection in .env before migrating)</p>
<div class="snippet-clipboard-content notranslate position-relative overflow-auto">
    <pre class="notranslate">
        <code>php artisan migrate:fresh --seed</code>
    </pre>
</div>

<p>Run npm</p>
<div class="snippet-clipboard-content notranslate position-relative overflow-auto">
    <pre class="notranslate">
        <code>npm install</code>
        <code>npm run dev</code>
    </pre>
</div>

<p>Start the local development server</p>
<div class="snippet-clipboard-content notranslate position-relative overflow-auto">
    <pre class="notranslate">
        <code>php artisan serve</code>
    </pre>
</div>

## Credentials and Seeders

<p>Seeder will generate 6 users and each of them will have 5 products. Also, 3 categories will be created.</p>
<p>Username/email: Admin1/admin@example.com</p>
<p>password: password</p>
