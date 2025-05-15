# Setting up GitHub Actions Deployment

This guide will help you set up GitHub Actions to automatically deploy your application to your hosting environment.

## Step 1: Push Your Repository to GitHub

If you haven't already, create a new repository on GitHub and push your code to it:

```bash
git init
git add .
git commit -m "Initial commit"
git branch -M main
git remote add origin YOUR_GITHUB_REPO_URL
git push -u origin main
```

## Step 2: Set Up GitHub Actions Secret

You need to add your SSH private key as a secret in your GitHub repository:

1. View your private key by running:
   ```bash
   cat ~/.ssh/id_rsa
   ```

2. Copy the entire output (including the BEGIN and END lines)

3. Go to your GitHub repository in the browser
   - Navigate to Settings > Secrets and Variables > Actions
   - Click "New repository secret"
   - Name: `DEPLOY_SSH_KEY`
   - Value: Paste the entire content of your private key
   - Click "Add secret"

## Step 3: Test the Deployment

Make a small change to your repository, commit it, and push to the main branch:

```bash
# Make a change to a file
git add .
git commit -m "Test GitHub Actions deployment"
git push
```

Go to the "Actions" tab in your GitHub repository to monitor the deployment process.

## Troubleshooting

If the deployment fails, check the following:

1. Verify that the SSH key has been added correctly as a secret
2. Ensure that the public key is properly set up on the server
3. Check that the SSH host is correctly specified in the workflow file
4. Verify that the paths in the deployment workflow are correct

For more detailed logs, you can check the output of the GitHub Actions workflow in the Actions tab.
