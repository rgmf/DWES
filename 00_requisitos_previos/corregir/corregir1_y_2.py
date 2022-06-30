import argparse
import os

from urllib.parse import urlparse


if __name__ == "__main__":
    parser = argparse.ArgumentParser()
    parser.add_argument("-u", "--github-users", required=True, help="File with GitHub users, one user per line")
    parser.add_argument("-r", "--repository-name", required=True, help="Repository name")
    args = parser.parse_args()

    with open(args.github_users, "r") as fd:
        github_users = [ line[:-1] for line in fd.readlines() ]

    for user in github_users:
        github_url = f"git@github.com:{user}/{args.repository_name}.git"

        os.system(f"git clone {github_url} {user}")

        print(f"Repositorio del usuario {user} clonado")
