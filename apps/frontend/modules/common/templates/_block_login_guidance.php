<?php if (! $sf_user->isAuthenticated() ): ?>
<br/>
<b>Demo login:</b>
<ul>
  <li>guest:
    <ul>
      <li>user: guest</li>
      <li>pass: guest</li>
    </ul>
  </li>  
  <li>editor/ data entry (front-end):
    <ul>
      <li>user: editor</li>
      <li>pass: editor</li>
    </ul>
  </li>
  <li>administrator (back-end):
    <ul>
      <li>user: admin</li>
      <li>pass: admin</li>
    </ul>
  </li>
</ul>
<?php endif; ?>	
